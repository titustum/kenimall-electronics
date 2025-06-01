<x-custom-layout>


    <!-- Popular Products Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-purple-50 relative overflow-hidden"
        data-aos="fade-up">
        <!-- Background Decorations -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-10 w-32 h-32 bg-purple-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-40 h-40 bg-pink-500 rounded-full blur-3xl"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-blue-500 rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center bg-gradient-to-r from-purple-100 via-pink-100 to-blue-100 px-6 py-3 rounded-full text-purple-700 font-semibold mb-6 shadow-lg backdrop-blur-sm border border-purple-200">
                    <i class="fas fa-fire mr-2 text-orange-500 animate-pulse"></i>
                    <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Trending
                        Now</span>
                </div>
                <h2
                    class="text-4xl lg:text-6xl font-bold bg-gradient-to-r from-gray-900 via-purple-800 to-pink-700 bg-clip-text text-transparent mb-6">
                    Popular Products
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Discover our most loved electronics that are flying off the shelves.
                    <span class="font-semibold text-purple-600">Limited time offers available!</span>
                </p>
            </div>

            <!-- Enhanced Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-12" data-aos="fade-up" data-aos-delay="100">
                <button
                    class="filter-btn active bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg shadow-md"
                    data-filter="all">
                    <i class="fas fa-th-large mr-2"></i>
                    <span>All Products</span>
                    <span class="ml-2 bg-white/20 px-2 py-1 rounded-full text-xs">{{ $products->count() }}</span>
                </button>
                <button
                    class="filter-btn bg-white text-gray-700 px-8 py-4 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-300 hover:bg-purple-50 transition-all duration-300 hover:scale-105 shadow-md"
                    data-filter="smartphones">
                    <i class="fas fa-mobile-alt mr-2 text-blue-500"></i>
                    <span>Smartphones</span>
                    <span class="ml-2 bg-gray-100 px-2 py-1 rounded-full text-xs">{{ $products->where('category.name',
                        'Smartphones')->count() }}</span>
                </button>
                <button
                    class="filter-btn bg-white text-gray-700 px-8 py-4 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-300 hover:bg-purple-50 transition-all duration-300 hover:scale-105 shadow-md"
                    data-filter="laptops">
                    <i class="fas fa-laptop mr-2 text-green-500"></i>
                    <span>Laptops</span>
                    <span class="ml-2 bg-gray-100 px-2 py-1 rounded-full text-xs">{{ $products->where('category.name',
                        'Laptops')->count() }}</span>
                </button>
                <button
                    class="filter-btn bg-white text-gray-700 px-8 py-4 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-300 hover:bg-purple-50 transition-all duration-300 hover:scale-105 shadow-md"
                    data-filter="accessories">
                    <i class="fas fa-headphones mr-2 text-purple-500"></i>
                    <span>Accessories</span>
                    <span class="ml-2 bg-gray-100 px-2 py-1 rounded-full text-xs">{{ $products->where('category.name',
                        'Accessories')->count() }}</span>
                </button>
            </div>

            <!-- Sort and View Options -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4" data-aos="fade-up"
                data-aos-delay="150">
                <div class="flex items-center space-x-4">
                    <label class="text-gray-600 font-medium">Sort by:</label>
                    <select id="sort-select"
                        class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="featured">Featured</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="name">Name A-Z</option>
                        <option value="newest">Newest First</option>
                    </select>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 text-sm">View:</span>
                    <button id="grid-view"
                        class="p-2 rounded-lg bg-purple-100 text-purple-600 hover:bg-purple-200 transition-colors">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button id="list-view"
                        class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 transition-all duration-500"
                id="products-grid">
                @foreach ($products as $index => $product)
                @php
                $filterClass = strtolower(str_replace(' ', '-', $product->category->name ?? 'all'));
                $imageUrl = Storage::exists($product->image_path) ? Storage::url($product->image_path) :
                $product->image_path;
                $price = $product->sale_price ?? $product->price;
                $hasSale = !is_null($product->sale_price) && $product->sale_price < $product->price;
                    $delay = 200 + ($index * 50);
                    $discount = $hasSale ? round((($product->price - $product->sale_price) / $product->price) * 100) :
                    0;
                    $rating = $product->average_rating ?? 4.5;
                    $reviewCount = $product->reviews_count ?? rand(50, 200);
                    @endphp

                    <div class="product-card {{ $filterClass }} bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 group relative border border-gray-100"
                        data-aos="fade-up" data-aos-delay="{{ $delay }}" data-price="{{ $price }}"
                        data-name="{{ $product->name }}" data-created="{{ $product->created_at }}">

                        <!-- Product Image Container -->
                        <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <a href="{{ route('products.show', $product->slug) }}" class="block">
                                <img src="{{ $imageUrl }}" alt="{{ $product->name }}"
                                    class="w-full h-64 object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy">
                            </a>

                            <!-- Discount Badge -->
                            @if($hasSale)
                            <div class="absolute top-4 left-4 z-10">
                                <div
                                    class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-2 rounded-full text-sm font-bold shadow-lg">
                                    <i class="fas fa-percent mr-1"></i>
                                    {{ $discount }}% OFF
                                </div>
                            </div>
                            @endif

                            <!-- Hot Badge for Popular Items -->
                            @if($product->is_featured || $index < 3) <div
                                class="absolute top-4 left-4 z-10 {{ $hasSale ? 'top-16' : 'top-4' }}">
                                <div
                                    class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-2 rounded-full text-xs font-bold shadow-lg animate-pulse">
                                    🔥 HOT
                                </div>
                        </div>
                        @endif

                        <!-- Stock Status -->
                        @if($product->stock <= 5 && $product->stock > 0)
                            <div class="absolute bottom-4 left-4 z-10">
                                <div class="bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    Only {{ $product->stock }} left!
                                </div>
                            </div>
                            @endif

                            <!-- Action Buttons -->
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="flex space-x-3">
                                    <button onclick="quickView({{ $product->id }})"
                                        class="bg-white text-gray-800 p-3 rounded-full hover:bg-gray-100 transition-all transform hover:scale-110 shadow-lg">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="toggleWishlist({{ $product->id }})"
                                        class="bg-white text-gray-800 p-3 rounded-full hover:bg-red-50 hover:text-red-500 transition-all transform hover:scale-110 shadow-lg">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button onclick="quickAddToCart({{ $product->id }})"
                                        class="bg-purple-600 text-white p-3 rounded-full hover:bg-purple-700 transition-all transform hover:scale-110 shadow-lg">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-6 space-y-4">
                        <!-- Rating -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="flex text-yellow-400 text-sm">
                                    @for ($i = 1; $i <= 5; $i++) <i
                                        class="fas fa-star {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}">
                                        </i>
                                        @endfor
                                </div>
                                <span class="text-gray-500 text-sm">({{ $reviewCount }})</span>
                            </div>
                            <div class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                {{ $product->category->name ?? 'General' }}
                            </div>
                        </div>

                        <!-- Product Name -->
                        <a href="{{ route('products.show', $product->slug) }}" class="block">
                            <h3
                                class="text-xl font-bold text-gray-900 mb-2 hover:text-purple-600 transition-colors line-clamp-2">
                                {{ $product->name }}
                            </h3>
                        </a>

                        <!-- Product Description -->
                        <p class="text-gray-600 text-sm line-clamp-2 leading-relaxed">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <!-- Price and Stock -->
                        <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                            <div class="flex items-baseline space-x-2">
                                <span class="text-2xl font-bold text-purple-600">
                                    ${{ number_format($price, 2) }}
                                </span>
                                @if ($hasSale)
                                <span class="text-lg text-gray-400 line-through">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                                @endif
                            </div>
                            <div
                                class="flex items-center {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} text-sm font-semibold">
                                <i
                                    class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="flex space-x-2 pt-2">
                            <a href="{{ route('products.show', $product->slug) }}"
                                class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 px-4 rounded-xl font-semibold text-center hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-md">
                                View Details
                            </a>
                            @if($product->stock > 0)
                            <button onclick="quickAddToCart({{ $product->id }})"
                                class="px-4 py-3 border-2 border-purple-600 text-purple-600 rounded-xl hover:bg-purple-600 hover:text-white transition-all transform hover:scale-105">
                                <i class="fas fa-plus"></i>
                            </button>
                            @endif
                        </div>

                        
                    </div>
            </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="1000">
            <button id="load-more-btn"
                class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg hover:shadow-xl">
                <i class="fas fa-plus mr-2"></i>
                Load More Products
            </button>

            <div class="mt-4">
                <a href="{{ route('products.index') }}"
                    class="inline-flex items-center text-purple-600 hover:text-purple-700 font-semibold transition-colors">
                    <span>View All Products</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Loading Indicator -->
        <div id="loading-indicator" class="hidden text-center py-8">
            <div class="inline-flex items-center space-x-2">
                <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-purple-600"></div>
                <span class="text-gray-600">Loading more products...</span>
            </div>
        </div>
        </div>
    </section>

    <!-- Quick View Modal -->
    <div id="quickViewModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-4xl w-full max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-2xl font-bold text-gray-900">Quick View</h3>
                <button onclick="closeQuickView()" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="quickViewContent" class="p-6">
                <!-- Quick view content will be loaded here -->
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');
    const sortSelect = document.getElementById('sort-select');
    const gridView = document.getElementById('grid-view');
    const listView = document.getElementById('list-view');
    const productsGrid = document.getElementById('products-grid');

    // Filter products
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-gradient-to-r', 'from-purple-600', 'to-pink-600', 'text-white');
                b.classList.add('bg-white', 'text-gray-700', 'border-2', 'border-gray-200');
            });
            
            this.classList.add('active', 'bg-gradient-to-r', 'from-purple-600', 'to-pink-600', 'text-white');
            this.classList.remove('bg-white', 'text-gray-700', 'border-2', 'border-gray-200');

            // Filter products
            productCards.forEach(card => {
                if (filter === 'all' || card.classList.contains(filter)) {
                    card.style.display = 'block';
                    card.classList.remove('hidden');
                } else {
                    card.style.display = 'none';
                    card.classList.add('hidden');
                }
            });
        });
    });

    // Sort products
    sortSelect.addEventListener('change', function() {
        const sortValue = this.value;
        const visibleCards = Array.from(productCards).filter(card => !card.classList.contains('hidden'));
        
        visibleCards.sort((a, b) => {
            switch (sortValue) {
                case 'price-low':
                    return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                case 'price-high':
                    return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                case 'name':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'newest':
                    return new Date(b.dataset.created) - new Date(a.dataset.created);
                default:
                    return 0;
            }
        });

        // Reorder DOM elements
        visibleCards.forEach(card => productsGrid.appendChild(card));
    });

    // View toggle
    gridView.addEventListener('click', function() {
        productsGrid.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 transition-all duration-500';
        this.classList.add('bg-purple-100', 'text-purple-600');
        this.classList.remove('bg-gray-100', 'text-gray-600');
        listView.classList.add('bg-gray-100', 'text-gray-600');
        listView.classList.remove('bg-purple-100', 'text-purple-600');
    });

    listView.addEventListener('click', function() {
        productsGrid.className = 'grid grid-cols-1 gap-6 transition-all duration-500';
        this.classList.add('bg-purple-100', 'text-purple-600');
        this.classList.remove('bg-gray-100', 'text-gray-600');
        gridView.classList.add('bg-gray-100', 'text-gray-600');
        gridView.classList.remove('bg-purple-100', 'text-purple-600');
    });
});

// Quick view functionality
function quickView(productId) {
    const modal = document.getElementById('quickViewModal');
    const content = document.getElementById('quickViewContent');
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Load product data (you'd fetch this from your API)
    content.innerHTML = '<div class="text-center py-8"><i class="fas fa-spinner fa-spin text-2xl text-purple-600"></i></div>';
    
    // Simulate API call
    setTimeout(() => {
        content.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <img src="/api/placeholder/400/300" alt="Product" class="w-full rounded-lg">
                </div>
                <div class="space-y-4">
                    <h4 class="text-2xl font-bold">Product Name</h4>
                    <p class="text-gray-600">Product description...</p>
                    <div class="text-2xl font-bold text-purple-600">$299.99</div>
                    <button class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition-colors">
                        Add to Cart
                    </button>
                </div>
            </div>
        `;
    }, 1000);
}

function closeQuickView() {
    const modal = document.getElementById('quickViewModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Quick add to cart
function quickAddToCart(productId) {
    // Add your cart functionality here
    showNotification('Product added to cart!', 'success');
}

// Wishlist toggle
function toggleWishlist(productId) {
    // Add your wishlist functionality here
    showNotification('Added to wishlist!', 'success');
}

// Notification system
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-4 rounded-lg shadow-lg z-50 ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    } transform translate-x-full transition-transform duration-300`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => notification.classList.remove('translate-x-full'), 100);
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Load more functionality
document.getElementById('load-more-btn').addEventListener('click', function() {
    const loadingIndicator = document.getElementById('loading-indicator');
    
    this.style.display = 'none';
    loadingIndicator.classList.remove('hidden');
    
    // Simulate loading more products
    setTimeout(() => {
        loadingIndicator.classList.add('hidden');
        this.style.display = 'block';
        showNotification('More products loaded!', 'success');
    }, 2000);
});
    </script>
    @endpush

    @push('styles')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover {
            transform: translateY(-8px);
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .animate-pulse {
            animation: pulse 2s infinite;
        }
    </style>
    @endpush

</x-custom-layout>