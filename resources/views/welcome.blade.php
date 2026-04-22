<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NextGen Shop | Premium E-commerce</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans antialiased text-gray-900">

    <nav class="bg-slate-900/95 backdrop-blur-md border-b border-slate-800 px-6 py-4 sticky top-0 z-50 transition-all">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white font-black text-2xl italic uppercase tracking-tighter">
                NextGen <span class="text-indigo-500">Shop</span>
            </div>
            
            <div class="hidden md:flex gap-8 text-slate-300 text-xs font-bold uppercase tracking-widest">
                <a href="/" class="hover:text-indigo-400 transition">Home</a>
                <a href="{{ route('products.index') }}" class="hover:text-indigo-400 transition">Catalog</a>
                <a href="#features" class="hover:text-indigo-400 transition">Features</a>
            </div>

            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-white text-sm font-bold transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg text-sm font-bold shadow-lg transition">Join Us</a>
                @else
                    <a href="{{ url('/dashboard') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2 rounded-lg text-sm font-bold shadow-lg transition">Dashboard</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="relative flex flex-col flex-1">
        
        <header class="bg-slate-900 text-white py-20 md:py-32 relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-96 h-96 bg-indigo-600/20 rounded-full blur-[120px]"></div>
            <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-purple-600/10 rounded-full blur-[120px]"></div>
            
            <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 items-center gap-12 relative z-10">
                <div class="text-left">
                    <div class="inline-block px-4 py-1.5 bg-indigo-500/10 border border-indigo-500/20 rounded-full text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em] mb-6">
                        v2.0 Backend Powered
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black mb-6 italic tracking-tighter uppercase leading-[0.95]">
                        Next Gen <br><span class="text-indigo-500">Shop</span> Solutions
                    </h1>
                    <p class="text-lg md:text-xl mb-10 text-slate-300 font-medium max-w-lg leading-relaxed">
                        A robust, full-stack e-commerce engine built with <span class="text-white border-b-2 border-indigo-500">Laravel 11</span> and <span class="text-white border-b-2 border-indigo-500">Tailwind CSS</span> for high-performance scaling.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        @guest
                            <a href="{{ route('login') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-xl shadow-indigo-500/20 hover:bg-indigo-700 transition transform hover:-translate-y-1 flex items-center gap-2">
                                🚀 Admin Panel Login
                            </a>
                            <a href="{{ route('register') }}" class="px-8 py-4 bg-white/5 border border-white/10 text-white font-bold rounded-xl hover:bg-white/10 transition backdrop-blur-sm">
                                Become a Vendor
                            </a>
                        @else
                            <a href="{{ url('/dashboard') }}" class="px-10 py-4 bg-emerald-500 text-white font-bold rounded-xl shadow-xl shadow-emerald-500/20 hover:bg-emerald-600 transition transform hover:-translate-y-1">
                                Open Merchant Dashboard
                            </a>
                        @endguest
                    </div>
                </div>

      <div class="hidden md:block relative group">
    <div class="absolute inset-0 bg-indigo-600/10 blur-[100px] rounded-full group-hover:bg-indigo-600/20 transition-all duration-500 animate-pulse"></div>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-purple-500/10 blur-3xl rounded-full transition-all duration-500 group-hover:bg-purple-500/20"></div>

    <div class="relative z-10 p-2 bg-slate-800 rounded-3xl shadow-2xl shadow-slate-900/30 border border-slate-700 hover:shadow-indigo-500/20 transition-all duration-500 transform group-hover:-translate-y-2 group-hover:scale-105">
        <img src="{{ asset('images/dashboard-preview.png') }}" 
             class="w-full rounded-2xl border border-slate-600 drop-shadow-lg object-cover" 
             alt="NextGen Merchant Dashboard Preview">
    </div>
</div>
            </div>
        </header>

        <section id="features" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-black text-slate-800 uppercase tracking-tighter">Engineered for Performance</h2>
                    <p class="text-gray-500 mt-2">Scalable architecture for modern digital commerce.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    <div class="group bg-gray-50 p-10 rounded-[2.5rem] border border-gray-100 hover:border-indigo-200 hover:bg-white hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-500">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-indigo-600 group-hover:scale-110 transition-all duration-500">📦</div>
                        <h3 class="text-xl font-black mb-3 text-slate-800 uppercase tracking-tight">Advanced Inventory</h3>
                        <p class="text-gray-500 leading-relaxed text-sm">Real-time stock tracking with Eloquent ORM relationships and automated low-stock alerts.</p>
                    </div>

                    <div class="group bg-gray-50 p-10 rounded-[2.5rem] border border-gray-100 hover:border-amber-200 hover:bg-white hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-5