<nav x-data="{ open: false }" class="relative z-20 border-b border-white/10 bg-slate-950/80 backdrop-blur-xl">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ url('/') }}">
                        <span class="flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-500 text-sm font-bold text-white shadow-lg shadow-indigo-950/50">W</span>
                            <span class="text-sm font-semibold tracking-tight text-white">Workshop<span class="text-indigo-300">.</span></span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden items-center space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ url('/') }}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->is('/') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Home') }}</a>
                    <a href="{{ route('posts.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('posts.*') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Posts') }}</a>
                    <a href="{{ route('products.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('products.*') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Products') }}</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Dashboard') }}</a>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.04] px-3.5 py-2.5 text-sm font-medium text-slate-200 transition hover:border-white/20 hover:bg-white/[0.08] focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
                <div class="hidden items-center space-x-3 sm:ms-6 sm:flex">
                    @if (Route::has('login'))
                        <a class="rounded-lg px-3 py-2 text-sm font-medium text-slate-300 transition hover:text-white" href="{{ route('login') }}">{{ __('Log in') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="rounded-lg bg-white px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-indigo-100" href="{{ route('register') }}">{{ __('Get started') }}</a>
                    @endif
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-xl border border-white/10 p-2.5 text-slate-300 transition hover:bg-white/10 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-white/10 bg-slate-950 px-4 pb-4 pt-3 sm:hidden">
        <div class="space-y-1">
            <a href="{{ url('/') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->is('/') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Home') }}</a>
            <a href="{{ route('posts.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->routeIs('posts.*') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Posts') }}</a>
            <a href="{{ route('products.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->routeIs('products.*') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Products') }}</a>
            @auth
                <a href="{{ route('dashboard') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/[0.06] hover:text-white' }}">{{ __('Dashboard') }}</a>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 hover:bg-white/[0.06] hover:text-white">{{ __('Log in') }}</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 hover:bg-white/[0.06] hover:text-white">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
