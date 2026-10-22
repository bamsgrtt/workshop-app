<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0f1117">
    <title>Katalog Produk — eLEKTRONIK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:       #0f1117;
            --surface:  #161b27;
            --surface2: #1e2535;
            --border:   #2a3347;
            --accent:   #6366f1;
            --accent-h: #818cf8;
            --accent-glow: rgb(99 102 241 / .18);
            --text:     #e8ecf4;
            --muted:    #7a87a1;
            --success:  #34d399;
            --danger:   #f87171;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            min-height: 100vh;
            line-height: 1.5;
        }

        /* ── nav ── */
        nav {
            position: sticky; top: 0; z-index: 50;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 clamp(16px, 5vw, 48px); height: 56px;
            background: rgb(15 17 23 / .85);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .nav-left { display: flex; align-items: center; gap: 12px; }
        .nav-logo { font-size: 15px; font-weight: 700; letter-spacing: -.02em; }
        .nav-logo span { color: var(--accent-h); }
        .nav-count {
            padding: 2px 9px; border-radius: 20px;
            background: var(--surface2); border: 1px solid var(--border);
            font-size: 11px; color: var(--muted); font-weight: 500;
        }
        .btn-add {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 0 14px; height: 34px;
            background: var(--accent); border: none; border-radius: 8px;
            color: #fff; font: inherit; font-size: 13px; font-weight: 600;
            cursor: pointer; text-decoration: none;
            transition: background .15s, transform .15s;
        }
        .btn-add:hover { background: var(--accent-h); transform: translateY(-1px); }

        /* ── page ── */
        .page { width: min(100% - 32px, 1200px); margin: 0 auto; padding: 52px 0 80px; }

        /* ── hero ── */
        .hero { margin-bottom: 40px; }
        .eyebrow {
            display: inline-flex; align-items: center; gap: 6px;
            margin-bottom: 12px;
            color: var(--accent-h); font-size: 11px; font-weight: 600;
            letter-spacing: .1em; text-transform: uppercase;
        }
        .eyebrow::before {
            content: ''; width: 6px; height: 6px; border-radius: 50%;
            background: currentColor; animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse { 0%,100%{opacity:1}50%{opacity:.4} }
        .hero h1 {
            font-size: clamp(28px, 5vw, 42px); font-weight: 700; letter-spacing: -.04em;
            background: linear-gradient(135deg, #e8ecf4 0%, #5a6783 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
            margin-bottom: 10px;
        }
        .hero p { color: var(--muted); font-size: 14px; max-width: 500px; }

        /* ── empty state ── */
        .empty {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 16px; padding: 80px 24px;
            border: 2px dashed var(--border); border-radius: 20px;
            text-align: center; color: var(--muted);
        }
        .empty-icon { font-size: 48px; line-height: 1; }
        .empty h3 { font-size: 18px; font-weight: 600; color: var(--text); }
        .empty p { font-size: 14px; max-width: 320px; }

        /* ── grid of cards ── */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
        }

        .product-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px; overflow: hidden;
            display: flex; flex-direction: column;
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }
        .product-card:hover {
            transform: translateY(-4px);
            border-color: rgb(99 102 241 / .40);
            box-shadow: 0 24px 56px rgb(0 0 0 / .45), 0 0 0 1px rgb(99 102 241 / .15);
        }

        /* image block */
        .card-img {
            position: relative; aspect-ratio: 1 / 1;
            background: var(--surface2);
            overflow: hidden;
        }
        .card-img img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform .35s ease;
        }
        .product-card:hover .card-img img { transform: scale(1.04); }
        .card-img-placeholder {
            width: 100%; height: 100%;
            display: grid; place-items: center;
            font-size: 52px;
        }
        .card-badge {
            position: absolute; top: 12px; left: 12px;
            padding: 3px 9px; border-radius: 20px;
            background: rgb(0 0 0 / .55); backdrop-filter: blur(8px);
            border: 1px solid rgb(255 255 255 / .08);
            font-size: 11px; font-weight: 600; color: var(--text);
            text-transform: uppercase; letter-spacing: .06em;
        }
        .stock-badge {
            position: absolute; top: 12px; right: 12px;
            padding: 3px 9px; border-radius: 20px;
            font-size: 11px; font-weight: 600;
        }
        .stock-badge.in  { background: rgb(52 211 153/.15); border: 1px solid rgb(52 211 153/.35); color: var(--success); }
        .stock-badge.out { background: rgb(248 113 113/.15); border: 1px solid rgb(248 113 113/.35); color: var(--danger); }

        /* body */
        .card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; gap: 12px; }

        .card-meta { display: flex; align-items: center; justify-content: space-between; gap: 8px; }
        .card-brand { font-size: 11px; font-weight: 600; color: var(--accent-h); text-transform: uppercase; letter-spacing: .06em; }
        .card-category {
            padding: 2px 8px; border-radius: 20px;
            background: var(--surface2); border: 1px solid var(--border);
            font-size: 11px; color: var(--muted);
        }

        .card-name { font-size: 16px; font-weight: 600; letter-spacing: -.02em; line-height: 1.35; }

        .card-desc {
            font-size: 13px; color: var(--muted); line-height: 1.55;
            display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
        }

        /* specs mini */
        .specs {
            display: flex; flex-wrap: wrap; gap: 6px;
            padding-top: 12px; border-top: 1px solid var(--border);
        }
        .spec-chip {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 4px 9px; border-radius: 8px;
            background: var(--surface2); border: 1px solid var(--border);
            font-size: 11px; color: #a0aec0;
        }
        .spec-chip .spec-ico { font-size: 12px; }

        /* footer */
        .card-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 14px 20px;
            border-top: 1px solid var(--border);
            background: var(--surface2);
        }
        .card-price { font-size: 18px; font-weight: 700; letter-spacing: -.03em; color: var(--text); }
        .card-price small { font-size: 12px; color: var(--muted); font-weight: 400; margin-right: 2px; }
        .card-stock-txt { font-size: 12px; color: var(--muted); }

        @media (max-width: 500px) {
            .products-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-left">
            <span class="nav-logo">e<span>LEKTRONIK</span></span>
            <span class="nav-count">{{ $products->count() }} produk</span>
        </div>
        <a href="{{ route('acara29.products.create') }}" class="btn-add">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Tambah produk
        </a>
    </nav>

    <main class="page">

        <div class="hero">
            <div class="eyebrow">Katalog</div>
            <h1>Semua produk</h1>
            <p>Jelajahi koleksi perangkat elektronik terbaru dengan spesifikasi terlengkap.</p>
        </div>

        @if ($products->isEmpty())
            <div class="empty">
                <div class="empty-icon">📦</div>
                <h3>Belum ada produk</h3>
                <p>Tambahkan produk pertama Anda melalui tombol di atas.</p>
                <a href="{{ route('acara29.products.create') }}" class="btn-add">+ Tambah produk</a>
            </div>
        @else
            <div class="products-grid">
                @foreach ($products as $product)
                    <article class="product-card">

                        <div class="card-img">
                            @php
                                $hasImage = $product->image
                                    && $product->image !== 'product-default.jpg'
                                    && file_exists(storage_path('app/public/' . $product->image));
                            @endphp
                            @if ($hasImage)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}" loading="lazy">
                            @else
                                <div class="card-img-placeholder">💻</div>
                            @endif

                            <span class="card-badge">{{ $product->brand }}</span>

                            @if ($product->stock > 0)
                                <span class="stock-badge in">Tersedia</span>
                            @else
                                <span class="stock-badge out">Habis</span>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="card-meta">
                                <span class="card-brand">{{ $product->brand }}</span>
                                <span class="card-category">{{ $product->category->name ?? 'Umum' }}</span>
                            </div>

                            <h2 class="card-name">{{ $product->name }}</h2>

                            @if ($product->description)
                                <p class="card-desc">{{ $product->description }}</p>
                            @endif

                            @if ($product->processor || $product->ram || $product->storage || $product->display)
                                <div class="specs">
                                    @if ($product->processor)
                                        <span class="spec-chip"><span class="spec-ico">⚙️</span>{{ $product->processor }}</span>
                                    @endif
                                    @if ($product->ram)
                                        <span class="spec-chip"><span class="spec-ico">🧠</span>{{ $product->ram }}</span>
                                    @endif
                                    @if ($product->storage)
                                        <span class="spec-chip"><span class="spec-ico">💾</span>{{ $product->storage }}</span>
                                    @endif
                                    @if ($product->display)
                                        <span class="spec-chip"><span class="spec-ico">🖥</span>{{ $product->display }}</span>
                                    @endif
                                    @if ($product->graphics)
                                        <span class="spec-chip"><span class="spec-ico">🎮</span>{{ $product->graphics }}</span>
                                    @endif
                                    @if ($product->battery)
                                        <span class="spec-chip"><span class="spec-ico">🔋</span>{{ $product->battery }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <div>
                                <div class="card-price">
                                    <small>Rp</small>{{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                <div class="card-stock-txt">Stok: {{ $product->stock }} unit</div>
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
        @endif

    </main>

</body>
</html>
