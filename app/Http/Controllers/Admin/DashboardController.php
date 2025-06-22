<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Import Carbon

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with key metrics.
     */
    public function index(Request $request)
    {
        // --- Define Date Ranges using Carbon ---
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        // --- Current Period Metrics ---
        $currentTotalSales = Order::where('status', 'paid')
                                  ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                                  ->sum('total');

        $currentTotalOrders = Order::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                                   ->count();

        // Assuming 'role' column differentiates customers (role=customer)
        $currentTotalCustomers = User::where('role', "customer")
                                     ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                                     ->count();

        $currentAverageOrderValue = $currentTotalOrders > 0 ? $currentTotalSales / $currentTotalOrders : 0;


        // --- Last Period Metrics (Last Month) ---
        $lastPeriodTotalSales = Order::where('status', 'paid')
                                     ->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
                                     ->sum('total');

        $lastPeriodTotalOrders = Order::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
                                      ->count();

        $lastPeriodTotalCustomers = User::where('role', "customer")
                                       ->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
                                       ->count();

        $lastPeriodAverageOrderValue = $lastPeriodTotalOrders > 0 ? $lastPeriodTotalSales / $lastPeriodTotalOrders : 0;


        // --- Calculate Percentage Changes ---
        // Sales Change
        $salesChange = 0;
        if ($lastPeriodTotalSales > 0) {
            $salesChange = (($currentTotalSales - $lastPeriodTotalSales) / $lastPeriodTotalSales) * 100;
        } elseif ($currentTotalSales > 0) {
            $salesChange = 100; // If last period was 0 but current is > 0, it's a 100% increase
        }

        // Orders Change
        $ordersChange = 0;
        if ($lastPeriodTotalOrders > 0) {
            $ordersChange = (($currentTotalOrders - $lastPeriodTotalOrders) / $lastPeriodTotalOrders) * 100;
        } elseif ($currentTotalOrders > 0) {
            $ordersChange = 100;
        }

        // Customers Change
        $customersChange = 0;
        if ($lastPeriodTotalCustomers > 0) {
            $customersChange = (($currentTotalCustomers - $lastPeriodTotalCustomers) / $lastPeriodTotalCustomers) * 100;
        } elseif ($currentTotalCustomers > 0) {
            $customersChange = 100;
        }

        // Average Order Value Change
        $aovChange = 0;
        if ($lastPeriodAverageOrderValue > 0) {
            $aovChange = (($currentAverageOrderValue - $lastPeriodAverageOrderValue) / $lastPeriodAverageOrderValue) * 100;
        } elseif ($currentAverageOrderValue > 0) {
            $aovChange = 100;
        }


        // --- Get Counts for Management Overview (These are typically total counts, not period-specific) ---
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalAdmins = User::where('role', 'admin')->count();

         $latestOrders = Order::with('user') // Eager load the user (customer) associated with the order
                             ->orderBy('created_at', 'desc')
                             ->limit(5) // Get the 5 most recent orders
                             ->get();


        return view('admin.dashboard', [
            'title' => 'Admin Dashboard',
            'description' => 'Welcome to the admin dashboard. Here you can manage your application settings, users, and more.',

            // Pass key metrics (current period values)
            'totalSales' => $currentTotalSales,
            'salesChange' => $salesChange,
            'totalOrders' => $currentTotalOrders,
            'ordersChange' => $ordersChange,
            'totalCustomers' => $currentTotalCustomers,
            'customersChange' => $customersChange,
            'averageOrderValue' => $currentAverageOrderValue,
            'aovChange' => $aovChange,

            // Pass management overview counts
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalBrands' => $totalBrands,
            'totalAdmins' => $totalAdmins,

            // Pass latest orders
            'latestOrders' => $latestOrders,  
        ]);
    }
}