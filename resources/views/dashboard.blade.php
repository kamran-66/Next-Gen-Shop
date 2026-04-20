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

<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-xl shadow hover:scale-105 transition">
        <h2 class="text-lg font-semibold">🛍️Products</h2>
        <a href="{{ route('products.index') }}" class="text-indigo-600">View Products</h2></a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:scale-105 transition">
        <h2 class="text-lg font-semibold">🛒Your Cart</h2>
        <a href="{{ route('cart.index') }}" class="text-indigo-600">View</a>
    </div>

    @if(auth()->user()->role === 'admin')
    <div class="bg-white p-6 rounded-xl shadow hover:scale-105 transition">
        <h2 class="text-lg font-semibold">📦 Orders</h2>
        <a href="{{ route('orders.index') }}" class="text-indigo-600">Manage</a>
    </div>
    @endif

</div>

</x-layouts.app>
