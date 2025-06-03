<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = $request->has('is_admin') ? 'admin' : 'customer'; // Assuming 'role' is used to differentiate admin and customer
    

        try {
            User::create($validatedData);

            return redirect()->route('admin.users.index')
                             ->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->withInput()->with('error', 'Failed to create user. Please try again.');
        }
    }

    /**
     * Display the specified user.
     */
    public function show(User $user) // Using route model binding
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user) // Using route model binding
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user) // Using route model binding
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $validatedData['role'] = $request->has('is_admin') ? 'admin' : 'customer'; // Assuming 'role' is used to differentiate admin and customer

        try {
            $user->update($validatedData);

            return redirect()->route('admin.users.index')
                             ->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->withInput()->with('error', 'Failed to update user. Please try again.');
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user) // Using route model binding
    {
        try {
            $user->delete();

            return redirect()->route('admin.users.index')
                             ->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return back()->with('error', 'Failed to delete user. Please try again.');
        }
    }
}