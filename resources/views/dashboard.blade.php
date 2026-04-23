{{-- <x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> --}}

{{-- <x-layouts.app>

<div class="p-6">

    <h1 class="text-2xl text-black font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-3 gap-6">


        @if(auth()->user()->role === 'admin')
<a href="{{ route('orders.index') }}" 
   class="bg-white p-6 rounded-xl shadow hover:bg-indigo-100 transition">

    <h2 class="text-lg font-semibold">📦 Orders</h2>
    <p class="text-gray-500 mt-2">Manage all orders</p>

</a>
@endif


        <!-- Products Card -->
        <a href="{{ route('products.index') }}" 
           class="bg-white p-6 rounded-xl shadow hover:bg-indigo-100 transition">

            <h2 class="text-lg font-semibold">🛍️ Products</h2>
            <p class="text-gray-500 mt-2">Manage your products</p>

        </a>

        <!-- Cart (future) -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">🛒 Cart</h2>
            <p class="text-gray-500 mt-2">Coming soon</p>
        </div>

        <!-- Orders (future) -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">📦 Orders</h2>
            <p class="text-gray-500 mt-2">Coming soon</p>
        </div>

    </div>

</div>

</x-layouts.app> --}}




<x-layouts.app>
<div class="p-6">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8">Welcome Back, {{ auth()->user()->name }}! 👋</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-indigo-100 p-3 rounded-lg group-hover:bg-indigo-600 transition duration-300">
                    <span class="text-2xl group-hover:filter group-hover:brightness-0 group-hover:invert">🛍️</span>
                </div>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Products</h2>
            <p class="text-gray-500 text-sm mb-4">Explore and manage your shop inventory.</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center text-indigo-600 font-bold hover:gap-2 transition-all">
                View Products <span class="ml-1">→</span>
            </a>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-green-100 p-3 rounded-lg group-hover:bg-green-600 transition duration-300">
                    <span class="text-2xl group-hover:filter group-hover:brightness-0 group-hover:invert">🛒</span>
                </div>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Your Cart</h2>
            <p class="text-gray-500 text-sm mb-4">Check items you're ready to purchase.</p>
            <a href="{{ route('cart.index') }}" class="inline-flex items-center text-green-600 font-bold hover:gap-2 transition-all">
                View Cart <span class="ml-1">→</span>
            </a>
        </div>

        @if(auth()->user()->role === 'admin')
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-indigo-100 bg-indigo-50/30 hover:shadow-xl transition duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-purple-100 p-3 rounded-lg group-hover:bg-purple-600 transition duration-300">
                    <span class="text-2xl group-hover:filter group-hover:brightness-0 group-hover:invert">📦</span>
                </div>
                <span class="bg-indigo-600 text-white text-[10px] px-2 py-1 rounded-md font-bold uppercase">Admin Only</span>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Manage Orders</h2>
            <p class="text-gray-500 text-sm mb-4">Track sales and update order fulfillment.</p>
            <a href="{{ route('orders.index') }}" class="inline-flex items-center text-purple-600 font-bold hover:gap-2 transition-all">
                Order Dashboard <span class="ml-1">→</span>
            </a>
        </div>
        @endif
    </div>

    @if(auth()->user() && auth()->user()->is_admin)

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 mt-8">
    <h3 class="text-lg font-bold mb-4">Weekly Sales Analytics</h3>
    <div id="salesChart"></div>
</div>
@endif

</div>
</x-layouts.app>
