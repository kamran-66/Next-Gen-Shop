{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce - Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 flex" x-data="{ sidebarOpen: true }">

<aside class="w-64 bg-indigo-700 text-white p-6 space-y-6 sticky top-0 h-screen flex-shrink-0 overflow-y-auto">
    
    @auth
        @if(auth()->user()->role === 'admin')
            <h2 class="text-2xl font-bold border-b border-indigo-500 pb-2">🛡️ Admin</h2>
            <nav class="space-y-2 mt-4">
                <a href="{{ route('dashboard') }}" class="block hover:bg-indigo-600 p-2 rounded {{ request()->routeIs('dashboard') ? 'bg-indigo-800' : '' }}">Dashboard</a>
                <a href="{{ route('products.index') }}" class="block hover:bg-indigo-600 p-2 rounded">Products</a>
                <a href="{{ route('cart.index') }}" class="block hover:bg-indigo-600 p-2 rounded">Cart</a>
                <a href="{{ route('orders.index') }}" class="block hover:bg-indigo-600 p-2 rounded">Orders</a>
                <a href="{{ url('users-test') }}" class="block hover:bg-indigo-600 p-2 rounded">Users List</a>
            </nav>
        @else
            <h2 class="text-2xl font-bold border-b border-indigo-500 pb-2">🛍️ User</h2>
            <nav class="space-y-2 mt-4">
                <a href="{{ route('dashboard') }}" class="block hover:bg-indigo-600 p-2 rounded">Dashboard</a>
                <a href="{{ route('products.index') }}" class="block hover:bg-indigo-600 p-2 rounded">Products</a>
                <a href="{{ route('cart.index') }}" class="block hover:bg-indigo-600 p-2 rounded">Cart</a>
            </nav>
        @endif
    @endauth
</aside>

<div class="flex-1 flex flex-col min-h-screen">

    <header class="bg-white shadow p-4 flex justify-between items-center">
        
  <form method="GET" 
      action="{{ request()->is('products*') ? route('products.index') : url('/users-test') }}" 
      class="flex gap-2 items-center flex-1 max-w-md ml-10">
    
    <input type="text" 
           name="search" 
           value="{{ request('search') }}" 
           placeholder="{{ request()->is('products*') ? 'Search products or categories...' : 'Search email or name...' }}"
           class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
        Search
    </button>
</form>

        <div class="relative mr-5" x-data="{ open: false }">
            <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2 focus:outline-none bg-gray-50 p-2 rounded-lg hover:bg-gray-100 transition">
                <span class="font-bold text-gray-700">{{ auth()->user()->name }}</span>
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" 
                 x-transition 
                 class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-xl z-50">
                
                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-indigo-50 border-b border-gray-100">
                    👤 Edit Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50">
                        🚪 Log Out
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="p-6">
        {{ $slot }}
    </main>

</div>

@if(session('success'))
<div id="toast" class="fixed bottom-5 right-5 bg-green-600 text-white px-6 py-3 rounded-lg shadow-2xl z-50">
    {{ session('success') }}
</div>
<script>
    setTimeout(() => document.getElementById('toast')?.remove(), 3000);
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        series: [{
            name: 'Total Orders',
            data: [12, 18, 15, 25, 21, 35, 30] // Ye data baad mein hum backend se layenge
        }],
        chart: {
            type: 'area',
            height: 300,
            toolbar: { show: false },
            zoom: { enabled: false }
        },
        colors: ['#6366f1'], // NextGen Indigo
        fill: {
            type: 'gradient',
            gradient: { shadeIntensity: 1, opacityFrom: 0.5, opacityTo: 0.1 }
        },
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 3 },
        xaxis: {
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#salesChart"), options);
    chart.render();
</script>
</body>
</html>
