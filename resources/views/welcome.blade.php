<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NextGen E-commerce Store</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    
    <body class="bg-gray-50 min-h-screen flex flex-col font-sans antialiased text-gray-900">

    <div class="relative flex flex-col flex-1">

        <header class="bg-slate-900 text-white py-24 relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-indigo-600/20 rounded-full blur-3xl"></div>
            
            <div class="max-w-4xl mx-auto text-center px-4 relative z-10">
                <h1 class="text-5xl md:text-6xl font-black mb-4 italic tracking-tighter uppercase">Next Gen Shop</h1>
                <p class="text-lg md:text-xl mb-8 text-slate-300 font-medium">
                    Premium Backend-Driven E-commerce API Solutions.
                </p>
                <div class="flex justify-center gap-4">
                    @guest
                        <a href="{{ route('login') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:bg-indigo-700 transition transform hover:-translate-y-1">Admin Login</a>
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-slate-900 font-bold rounded-xl shadow-lg hover:bg-gray-100 transition transform hover:-translate-y-1">Vendor Register</a>
                    @else
                        <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-emerald-500 text-white font-bold rounded-xl shadow-lg hover:bg-emerald-600 transition transform hover:-translate-y-1">Open Dashboard</a>
                    @endguest
                </div>
            </div>
        </header>

        <section class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-8">
                
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:border-indigo-200 hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-300">
                    <div class="text-4xl mb-4 text-indigo-600">📦</div>
                    <h3 class="text-xl font-black mb-2 text-slate-800 uppercase tracking-tight">Products & Inventory</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">Update stock, manage categories, and organize your digital shelf in real-time.</p>
                </div>

                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:border-amber-200 hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-300">
                    <div class="text-4xl mb-4 text-amber-500">🛒</div>
                    <h3 class="text-xl font-black mb-2 text-slate-800 uppercase tracking-tight">Order Processing</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">Monitor sales queue, track payments, and manage customer shipments through our API.</p>
                </div>

                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:border-emerald-200 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-300">
                    <div class="text-4xl mb-4 text-emerald-500">📈</div>
                    <h3 class="text-xl font-black mb-2 text-slate-800 uppercase tracking-tight">Sales Analytics</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">Generate visual reports of your daily revenue and customer engagement metrics.</p>
                </div>

            </div>
        </section>

        <footer class="bg-slate-900 py-10 mt-auto border-t border-slate-800">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <p class="text-slate-500 font-bold text-sm tracking-widest uppercase mb-2">Powered by Laravel 11 & MySQL</p>
                <div class="text-slate-400 text-xs">
                    &copy; {{ date('Y') }} <span class="text-white">Next Gen Shop</span>. All Rights Reserved.
                </div>
            </div>
        </footer>

    </div>
    </body>
</html>