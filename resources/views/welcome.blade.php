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
<body class="min-h-screen bg-slate-50 font-sans antialiased text-slate-900">
    @include('layouts.navigation.navigation')

    <main class="relative isolate overflow-hidden">
        <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[42rem] bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-indigo-100/70 via-white to-white"></div>
        <div aria-hidden="true" class="pointer-events-none absolute -right-40 top-28 -z-10 h-96 w-96 rounded-full bg-violet-100/60 blur-3xl"></div>

        <section class="mx-auto grid min-h-[calc(100vh-4rem)] max-w-7xl items-center gap-8 px-6 py-12 sm:py-16 lg:grid-cols-[220px_minmax(0,1.1fr)_minmax(0,0.9fr)] lg:gap-10 lg:px-8">
            <aside aria-label="Menu utama" class="self-stretch lg:py-8">
                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/70 backdrop-blur-xl lg:sticky lg:top-28">
                    <p class="px-3 pb-3 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Menu utama</p>
                    <nav class="grid grid-cols-2 gap-1 sm:grid-cols-3 lg:grid-cols-1" aria-label="Navigasi halaman">
                        <a href="{{ url('/') }}" aria-current="page" class="flex items-center gap-3 rounded-xl bg-indigo-50 px-3 py-2.5 text-sm font-medium text-indigo-700 ring-1 ring-inset ring-indigo-200 transition hover:bg-indigo-100">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1V10Z"/></svg>
                            Beranda
                        </a>
                        <a href="{{ route('posts.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
                            Artikel &amp; cerita
                        </a>
                        <a href="{{ route('products.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3 7 9-4 9 4-9 4-9-4Zm0 0v10l9 4 9-4V7M12 11v10"/></svg>
                            Produk &amp; sumber daya
                        </a>
                        <a href="{{ route('acara17.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-md bg-slate-100 text-[10px] font-semibold text-slate-600">17</span>Acara 17</a>
                        <a href="{{ route('acara18.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-md bg-slate-100 text-[10px] font-semibold text-slate-600">18</span>Acara 18</a>
                        <a href="{{ route('acara19.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-md bg-slate-100 text-[10px] font-semibold text-slate-600">19</span>Acara 19</a>
                        <a href="{{ route('form.show') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h8M3 6h.01M3 12h.01M3 18h.01"/></svg>
                            Formulir
                        </a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                                <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="1.5"/><rect x="13" y="3" width="8" height="5" rx="1.5"/><rect x="13" y="10" width="8" height="11" rx="1.5"/><rect x="3" y="13" width="8" height="8" rx="1.5"/></svg>
                                Dashboard
                            </a>
                        @endauth
                    </nav>
                </div>
            </aside>

            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-indigo-200 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-700">
                    <span class="h-2 w-2 rounded-full bg-indigo-400 shadow-[0_0_12px_rgba(129,140,248,0.9)]"></span>
                    A creative space for curious minds
                </div>

                <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl lg:text-7xl">
                    Turn your next idea into <span class="bg-gradient-to-r from-indigo-600 via-violet-600 to-fuchsia-600 bg-clip-text text-transparent">something real.</span>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600">
                    Find inspiration, discover practical resources, and connect the dots between a good idea and your next great project.
                </p>

                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-2 rounded-xl bg-indigo-500 px-6 py-3.5 text-sm font-semibold text-slate-900 shadow-lg shadow-indigo-200 transition hover:-translate-y-0.5 hover:bg-indigo-400">
                        Explore the workshop
                        <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.69L10.22 5.03a.75.75 0 1 1 1.06-1.06l5.5 5.5a.75.75 0 0 1 0 1.06l-5.5 5.5a.75.75 0 1 1-1.06-1.06l4.22-4.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-6 py-3.5 text-sm font-semibold text-slate-900 transition hover:border-slate-400 hover:bg-slate-100">Discover resources</a>
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="px-2 py-3 text-sm font-medium text-slate-600 transition hover:text-slate-900">Log in <span aria-hidden="true">â†’</span></a>
                        @endif
                    @else
                        <a href="{{ route('dashboard') }}" class="px-2 py-3 text-sm font-medium text-slate-600 transition hover:text-slate-900">Go to dashboard <span aria-hidden="true">â†’</span></a>
                    @endguest
                </div>

                <div class="mt-14 grid max-w-lg grid-cols-3 gap-4 border-t border-slate-200 pt-7">
                    <div><p class="text-xl font-bold text-slate-900">Explore</p><p class="mt-1 text-xs text-slate-600 sm:text-sm">Fresh ideas</p></div>
                    <div class="border-x border-slate-200 px-4"><p class="text-xl font-bold text-slate-900">Discover</p><p class="mt-1 text-xs text-slate-600 sm:text-sm">Useful resources</p></div>
                    <div class="pl-1 sm:pl-3"><p class="text-xl font-bold text-slate-900">Create</p><p class="mt-1 text-xs text-slate-600 sm:text-sm">Your next project</p></div>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-lg lg:mx-0 lg:justify-self-end">
                <div class="absolute -inset-4 rounded-[2rem] bg-gradient-to-br from-indigo-500/20 via-violet-500/10 to-fuchsia-500/20 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-2xl shadow-slate-200/70 backdrop-blur sm:p-8">
                    <div aria-hidden="true" class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-indigo-500/10 blur-3xl"></div>
                    <div class="flex items-center justify-between border-b border-slate-200 pb-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/><rect x="3" y="3" width="18" height="18" rx="5"/></svg>
                            </div>
                            <div><p class="text-sm font-semibold text-slate-900">A place to get inspired</p><p class="mt-0.5 text-xs text-slate-600">Explore whatâ€™s waiting for you</p></div>
                        </div>
                        <span class="rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700">Explore</span>
                    </div>

                    <div class="mt-6 space-y-4">
                        <a href="{{ route('posts.index') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 transition hover:border-indigo-400/30 hover:bg-indigo-400/[0.06]">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-violet-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg></div>
                            <div class="min-w-0 flex-1"><p class="font-semibold text-slate-900">Ideas &amp; stories</p><p class="mt-1 text-sm text-slate-600">Perspectives to spark your next idea</p></div>
                            <span class="text-slate-500 transition group-hover:translate-x-1 group-hover:text-indigo-700">â†’</span>
                        </a>
                        <a href="{{ route('products.index') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 transition hover:border-fuchsia-400/30 hover:bg-fuchsia-400/[0.06]">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-fuchsia-50 text-fuchsia-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3 7 9-4 9 4-9 4-9-4Zm0 0v10l9 4 9-4V7M12 11v10"/></svg></div>
                            <div class="min-w-0 flex-1"><p class="font-semibold text-slate-900">Tools &amp; resources</p><p class="mt-1 text-sm text-slate-600">Find something useful for your work</p></div>
                            <span class="text-slate-500 transition group-hover:translate-x-1 group-hover:text-fuchsia-700">â†’</span>
                        </a>
                    </div>

                    <div class="mt-6 rounded-2xl bg-gradient-to-br from-indigo-50 to-violet-50 p-5 ring-1 ring-slate-200">
                        <p class="text-sm font-medium text-indigo-700">Good work starts with curiosity.</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Take a look around, follow what interests you, and see where it leads.</p>
                    </div>
                </div>
                <div class="absolute -bottom-5 -left-5 -z-10 h-24 w-24 rounded-3xl border border-slate-200 bg-white"></div>
            </div>
        </section>

        <footer class="border-t border-slate-200">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-6 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <span>{{ config('app.name', 'Workshop App') }}</span>
                <span>Built for ideas in progress.</span>
            </div>
        </footer>
    </main>

@auth
<script>
    window.Echo.private('user.{{ auth()->id() }}')
        .listen('.order.placed', (e) => {
            alert(`Order #${e.order_id} telah ditempatkan! Total: Rp ${e.total}`);
            console.log('Order Placed:', e);
        });
</script>
@endauth
</body>
</html>
