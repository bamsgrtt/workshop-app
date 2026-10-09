<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Workshop App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 font-sans antialiased text-white">
    @include('layouts.navigation.navigation')

    <main class="relative isolate overflow-hidden">
        <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[42rem] bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-indigo-500/25 via-slate-950 to-slate-950"></div>
        <div aria-hidden="true" class="pointer-events-none absolute -right-40 top-28 -z-10 h-96 w-96 rounded-full bg-violet-500/10 blur-3xl"></div>

        <section class="mx-auto grid min-h-[calc(100vh-4rem)] max-w-7xl items-center gap-14 px-6 py-16 sm:py-20 lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-indigo-400/20 bg-indigo-400/10 px-4 py-2 text-sm font-medium text-indigo-200">
                    <span class="h-2 w-2 rounded-full bg-indigo-400 shadow-[0_0_12px_rgba(129,140,248,0.9)]"></span>
                    A creative space for curious minds
                </div>

                <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl lg:text-7xl">
                    Turn your next idea into <span class="bg-gradient-to-r from-indigo-300 via-violet-300 to-fuchsia-300 bg-clip-text text-transparent">something real.</span>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-300">
                    Find inspiration, discover practical resources, and connect the dots between a good idea and your next great project.
                </p>

                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-2 rounded-xl bg-indigo-500 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-950/40 transition hover:-translate-y-0.5 hover:bg-indigo-400">
                        Explore the workshop
                        <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.69L10.22 5.03a.75.75 0 1 1 1.06-1.06l5.5 5.5a.75.75 0 0 1 0 1.06l-5.5 5.5a.75.75 0 1 1-1.06-1.06l4.22-4.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center rounded-xl border border-white/15 bg-white/[0.04] px-6 py-3.5 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/[0.08]">Discover resources</a>
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="px-2 py-3 text-sm font-medium text-slate-300 transition hover:text-white">Log in <span aria-hidden="true">→</span></a>
                        @endif
                    @else
                        <a href="{{ route('dashboard') }}" class="px-2 py-3 text-sm font-medium text-slate-300 transition hover:text-white">Go to dashboard <span aria-hidden="true">→</span></a>
                    @endguest
                </div>

                <div class="mt-14 grid max-w-lg grid-cols-3 gap-4 border-t border-white/10 pt-7">
                    <div><p class="text-xl font-bold text-white">Explore</p><p class="mt-1 text-xs text-slate-400 sm:text-sm">Fresh ideas</p></div>
                    <div class="border-x border-white/10 px-4"><p class="text-xl font-bold text-white">Discover</p><p class="mt-1 text-xs text-slate-400 sm:text-sm">Useful resources</p></div>
                    <div class="pl-1 sm:pl-3"><p class="text-xl font-bold text-white">Create</p><p class="mt-1 text-xs text-slate-400 sm:text-sm">Your next project</p></div>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-lg lg:mx-0 lg:justify-self-end">
                <div class="absolute -inset-4 rounded-[2rem] bg-gradient-to-br from-indigo-500/20 via-violet-500/10 to-fuchsia-500/20 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[1.75rem] border border-white/10 bg-slate-900/80 p-6 shadow-2xl shadow-black/40 backdrop-blur sm:p-8">
                    <div aria-hidden="true" class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-indigo-500/10 blur-3xl"></div>
                    <div class="flex items-center justify-between border-b border-white/10 pb-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-400/15 text-indigo-300">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/><rect x="3" y="3" width="18" height="18" rx="5"/></svg>
                            </div>
                            <div><p class="text-sm font-semibold text-white">A place to get inspired</p><p class="mt-0.5 text-xs text-slate-400">Explore what’s waiting for you</p></div>
                        </div>
                        <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2.5 py-1 text-xs font-medium text-emerald-300">Explore</span>
                    </div>

                    <div class="mt-6 space-y-4">
                        <a href="{{ route('posts.index') }}" class="group flex items-center gap-4 rounded-2xl border border-white/[0.07] bg-white/[0.03] p-4 transition hover:border-indigo-400/30 hover:bg-indigo-400/[0.06]">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-violet-400/10 text-violet-300"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg></div>
                            <div class="min-w-0 flex-1"><p class="font-semibold text-white">Ideas &amp; stories</p><p class="mt-1 text-sm text-slate-400">Perspectives to spark your next idea</p></div>
                            <span class="text-slate-500 transition group-hover:translate-x-1 group-hover:text-indigo-300">→</span>
                        </a>
                        <a href="{{ route('products.index') }}" class="group flex items-center gap-4 rounded-2xl border border-white/[0.07] bg-white/[0.03] p-4 transition hover:border-fuchsia-400/30 hover:bg-fuchsia-400/[0.06]">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-fuchsia-400/10 text-fuchsia-300"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3 7 9-4 9 4-9 4-9-4Zm0 0v10l9 4 9-4V7M12 11v10"/></svg></div>
                            <div class="min-w-0 flex-1"><p class="font-semibold text-white">Tools &amp; resources</p><p class="mt-1 text-sm text-slate-400">Find something useful for your work</p></div>
                            <span class="text-slate-500 transition group-hover:translate-x-1 group-hover:text-fuchsia-300">→</span>
                        </a>
                    </div>

                    <div class="mt-6 rounded-2xl bg-gradient-to-br from-indigo-500/15 to-violet-500/5 p-5 ring-1 ring-white/[0.06]">
                        <p class="text-sm font-medium text-indigo-200">Good work starts with curiosity.</p>
                        <p class="mt-2 text-sm leading-6 text-slate-400">Take a look around, follow what interests you, and see where it leads.</p>
                    </div>
                </div>
                <div class="absolute -bottom-5 -left-5 -z-10 h-24 w-24 rounded-3xl border border-white/10 bg-white/[0.02]"></div>
            </div>
        </section>

        <footer class="border-t border-white/10">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-6 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <span>{{ config('app.name', 'Workshop App') }}</span>
                <span>Built for ideas in progress.</span>
            </div>
        </footer>
    </main>
</body>
</html>
