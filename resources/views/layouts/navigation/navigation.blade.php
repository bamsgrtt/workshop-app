<nav x-data="{ open: false }" class="sticky top-0 z-20 border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-sm font-bold text-white">W</span>
                    <span class="text-base font-semibold tracking-tight text-slate-900">Workshop<span class="text-indigo-600">.</span></span>
                </a>
                <div class="hidden items-center gap-1 sm:flex">
                    <a href="{{ url('/') }}" class="rounded-lg px-3 py-2 text-sm font-medium {{ request()->is('/') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Beranda</a>
                    <a href="{{ route('posts.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('posts.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Artikel</a>
                    <a href="{{ route('products.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('products.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Produk</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Dashboard</a>
                        <a href="{{ route('acara31_32.part2.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('acara31_32.part2.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Broadcasting</a>
                    @endauth
                </div>
            </div>

            <div class="hidden items-center gap-3 sm:flex">
                @auth
                    <span class="text-sm text-slate-600">{{ Auth::user()->name }}</span>
                    <a href="{{ route('profile.edit') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-lg bg-slate-100 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-200">Keluar</button>
                    </form>
                @else
                    @if (Route::has('login'))
                        <a class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 hover:text-slate-900" href="{{ route('login') }}">Masuk</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700" href="{{ route('register') }}">Daftar</a>
                    @endif
                @endauth
            </div>

            <button @click="open = !open" :aria-expanded="open.toString()" aria-label="{{ __('Toggle navigation') }}" class="my-auto inline-flex items-center justify-center rounded-lg border border-slate-300 p-2 text-slate-600 hover:bg-slate-100 sm:hidden">
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-cloak x-show="open" class="border-t border-slate-200 bg-white px-4 py-3 sm:hidden">
        <div class="space-y-1">
            <a href="{{ url('/') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Beranda</a>
            <a href="{{ route('posts.index') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Artikel</a>
            <a href="{{ route('products.index') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Produk</a>
            @auth
                <a href="{{ route('dashboard') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Dashboard</a>
                <a href="{{ route('acara31_32.part2.index') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Acara 31–32 Part 2</a>
                <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full rounded-lg px-3 py-2 text-left text-sm text-slate-700 hover:bg-slate-100">Keluar</button>
                </form>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Masuk</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">Daftar</a>
                @endif
            @endauth
        </div>
    </div>
</nav>
