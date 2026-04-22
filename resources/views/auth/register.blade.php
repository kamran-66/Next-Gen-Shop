<x-guest-layout>
<div class="min-h-screen flex items-center justify-center bg-slate-900 relative overflow-hidden px-4 py-12">
    
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-indigo-600/20 rounded-full blur-[100px]"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-600/10 rounded-full blur-[100px]"></div>

    <div class="z-10 w-full max-w-md">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-xl shadow-indigo-500/20 mb-4 transform -rotate-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h1 class="text-white font-black text-3xl italic uppercase tracking-tighter">
                NextGen <span class="text-indigo-500 font-normal">Shop</span>
            </h1>
            <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.4em] mt-2">Registration Portal</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100">
            <div class="p-8 md:p-10">
                <div class="mb-8">
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight uppercase italic">Join Network</h2>
                    <p class="text-gray-400 text-sm font-medium">Start your merchant journey today.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Full Name</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                            </span>
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus placeholder="Kamran Khan"
                                class="block w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-transparent rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-semibold">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-rose-500 text-[10px] font-bold" />
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Email Address</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                            </span>
                            <input id="email" type="email" name="email" :value="old('email')" required placeholder="kamran@nextgen.com"
                                class="block w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-transparent rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-semibold">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-rose-500 text-[10px] font-bold" />
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Password</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                            </span>
                            <input id="password" type="password" name="password" required placeholder="••••••••"
                                class="block w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-transparent rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-semibold">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-rose-500 text-[10px] font-bold" />
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Verify Password</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-emerald-500 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                            </span>
                            <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="••••••••"
                                class="block w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-transparent rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-semibold">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-900 text-white py-4 rounded-2xl font-black shadow-xl shadow-indigo-200 hover:bg-indigo-600 active:scale-[0.97] transition-all duration-300 uppercase tracking-[0.2em] text-xs italic mt-4">
                        Register Account →
                    </button>
                </form>

                <div class="mt-8 text-center border-t border-gray-50 pt-6">
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">
                        Member already? 
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:underline ml-1">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-6">
            <a href="/" class="text-slate-500 hover:text-white text-[10px] font-black uppercase tracking-[0.3em] transition-all">
                ← Return to Store
            </a>
        </div>
    </div>
</div>
</x-guest-layout>