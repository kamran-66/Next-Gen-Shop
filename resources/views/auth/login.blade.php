<x-guest-layout>
<div class="min-h-screen flex items-center justify-center bg-slate-900 relative overflow-hidden px-4">
    
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-indigo-600/20 rounded-full blur-[100px]"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-600/10 rounded-full blur-[100px]"></div>

    <div class="z-10 w-full max-w-md">
        
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-xl shadow-indigo-500/20 mb-4 transform -rotate-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <h1 class="text-white font-black text-3xl italic uppercase tracking-tighter block">
                NextGen <span class="text-indigo-500 font-normal">Shop</span>
            </h1>
            <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.4em] mt-2">Merchant Portal</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-white/10">
            <div class="p-8 md:p-10">
                <div class="mb-8">
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight uppercase italic">Welcome Back</h2>
                    <p class="text-gray-400 text-sm font-medium">Log in to manage your inventory.</p>
                </div>

                <x-auth-session-status class="mb-6 text-emerald-600 text-sm font-bold bg-emerald-50 p-3 rounded-xl" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Account Email</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="admin@nextgen.shop"
                                class="block w-full pl-12 pr-4 py-4 bg-gray-50 border border-transparent rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all duration-200 font-semibold text-slate-800">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-rose-500 text-[11px] font-bold" />
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Secure Password</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required
                                placeholder="••••••••"
                                class="block w-full pl-12 pr-4 py-4 bg-gray-50 border border-transparent rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all duration-200 font-semibold">
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-1">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-[11px] text-gray-500 font-bold uppercase tracking-tighter">Stay signed in</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[11px] text-indigo-600 font-black uppercase tracking-tighter hover:text-indigo-800">
                                Reset?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-900 text-white py-4 rounded-2xl font-black shadow-xl shadow-indigo-200 hover:bg-indigo-600 active:scale-[0.97] transition-all duration-300 uppercase tracking-[0.2em] text-xs italic">
                        Access Dashboard →
                    </button>
                </form>

                <div class="mt-10 text-center border-t border-gray-100 pt-8">
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">
                        New Merchant? 
                        <a href="{{ route('register') }}" class="text-indigo-600 hover:underline ml-1">Apply Now</a>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-8">
            <a href="/" class="text-slate-500 hover:text-white text-[10px] font-black uppercase tracking-[0.4em] transition-all">
                ← Back to Storefront
            </a>
        </div>
    </div>
</div>
</x-guest-layout>