<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0f1117">
    <title>Tambah Produk — Acara 29</title>
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
            --accent-glow: rgb(99 102 241 / .20);
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

        /* ── top nav ── */
        nav {
            position: sticky; top: 0; z-index: 50;
            display: flex; align-items: center; gap: 12px;
            padding: 0 clamp(16px, 5vw, 48px);
            height: 56px;
            background: rgb(15 17 23 / .85);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .nav-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 3px 10px 3px 6px;
            background: var(--accent-glow);
            border: 1px solid rgb(99 102 241 / .35);
            border-radius: 20px;
            color: var(--accent-h);
            font-size: 11px; font-weight: 600; letter-spacing: .05em; text-transform: uppercase;
        }
        .nav-badge::before {
            content: ''; width: 6px; height: 6px;
            border-radius: 50%; background: var(--accent);
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse { 0%,100%{opacity:1}50%{opacity:.4} }
        .nav-title { font-size: 14px; font-weight: 600; color: var(--muted); }

        /* ── page shell ── */
        .page { width: min(100% - 32px, 820px); margin: 0 auto; padding: 56px 0 80px; }

        /* ── hero ── */
        .hero { margin-bottom: 36px; }
        .hero h1 {
            font-size: clamp(26px, 5vw, 38px);
            font-weight: 700; letter-spacing: -.04em;
            background: linear-gradient(135deg, #e8ecf4 0%, #7a87a1 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }
        .hero p { color: var(--muted); font-size: 14px; max-width: 520px; }

        /* ── error banner ── */
        .alert {
            display: flex; gap: 12px; align-items: flex-start;
            margin-bottom: 24px; padding: 14px 16px;
            background: rgb(248 113 113 / .08);
            border: 1px solid rgb(248 113 113 / .30);
            border-radius: 12px; color: var(--danger); font-size: 13px;
        }
        .alert-icon { font-size: 16px; flex-shrink: 0; line-height: 1.4; }
        .alert ul { padding-left: 16px; }
        .alert li + li { margin-top: 4px; }

        /* ── card ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgb(0 0 0 / .40);
        }
        .card-header {
            display: flex; align-items: center; gap: 12px;
            padding: 20px 28px;
            border-bottom: 1px solid var(--border);
            background: var(--surface2);
        }
        .card-icon {
            width: 38px; height: 38px; flex-shrink: 0;
            display: grid; place-items: center;
            background: var(--accent-glow);
            border: 1px solid rgb(99 102 241 / .30);
            border-radius: 10px; font-size: 18px;
        }
        .card-header h2 { font-size: 15px; font-weight: 600; }
        .card-header p { font-size: 12px; color: var(--muted); }
        .card-body { padding: clamp(20px, 4vw, 32px); }

        /* ── form grid ── */
        .grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .col-span-2 { grid-column: 1 / -1; }

        /* ── field ── */
        .field { display: flex; flex-direction: column; gap: 7px; }
        .field label { font-size: 13px; font-weight: 500; color: #a8b4cc; }
        .badge-opt {
            display: inline-block; margin-left: 6px;
            padding: 1px 7px; border-radius: 20px;
            background: var(--surface2); border: 1px solid var(--border);
            font-size: 10px; font-weight: 500; color: var(--muted);
            vertical-align: middle; letter-spacing: .03em;
        }

        input, select, textarea {
            width: 100%; padding: 11px 14px;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            font: inherit; font-size: 14px;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        input::placeholder, textarea::placeholder { color: #3d4d66; }
        input:focus, select:focus, textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-glow);
        }
        select option { background: var(--surface2); }
        textarea { min-height: 110px; resize: vertical; }

        /* ── file upload zone ── */
        .upload-zone {
            position: relative;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 8px; padding: 32px 16px;
            background: var(--bg);
            border: 2px dashed var(--border);
            border-radius: 12px; cursor: pointer;
            transition: border-color .15s, background .15s;
            text-align: center;
        }
        .upload-zone:hover { border-color: var(--accent); background: var(--accent-glow); }
        .upload-zone input[type=file] {
            position: absolute; inset: 0; opacity: 0; cursor: pointer;
            width: 100%; height: 100%; padding: 0; border: 0;
        }
        .upload-icon { font-size: 28px; line-height: 1; }
        .upload-label { font-size: 13px; font-weight: 500; color: var(--text); }
        .upload-label span { color: var(--accent-h); text-decoration: underline; }
        .upload-hint { font-size: 11px; color: var(--muted); }
        #preview-wrap { display: none; position: relative; }
        #preview-wrap img {
            width: 100%; max-height: 220px; object-fit: cover;
            border-radius: 10px; border: 1px solid var(--border); display: block;
        }
        .remove-img {
            position: absolute; top: 8px; right: 8px;
            width: 28px; height: 28px; border: none;
            background: rgb(0 0 0 / .6); color: #fff; border-radius: 50%;
            font-size: 14px; cursor: pointer; display: grid; place-items: center;
            transition: background .15s;
        }
        .remove-img:hover { background: var(--danger); }

        /* ── divider ── */
        .divider {
            grid-column: 1 / -1;
            display: flex; align-items: center; gap: 14px;
            color: var(--muted); font-size: 11px; font-weight: 600;
            text-transform: uppercase; letter-spacing: .08em;
        }
        .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: var(--border); }

        /* ── actions ── */
        .actions {
            display: flex; justify-content: flex-end; align-items: center; gap: 12px;
            padding: 20px 28px;
            border-top: 1px solid var(--border);
            background: var(--surface2);
        }
        .btn-ghost {
            padding: 0 18px; height: 42px;
            background: transparent; border: 1px solid var(--border); border-radius: 10px;
            color: var(--muted); font: inherit; font-size: 14px; font-weight: 500;
            cursor: pointer; transition: border-color .15s, color .15s;
            text-decoration: none; display: inline-flex; align-items: center;
        }
        .btn-ghost:hover { border-color: var(--accent-h); color: var(--text); }
        .btn-primary {
            padding: 0 22px; height: 42px;
            background: var(--accent); border: none; border-radius: 10px;
            color: #fff; font: inherit; font-size: 14px; font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 0 0 var(--accent-glow);
            transition: background .15s, transform .15s, box-shadow .15s;
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-primary:hover { background: var(--accent-h); transform: translateY(-1px); box-shadow: 0 8px 24px var(--accent-glow); }
        .btn-primary:active { transform: translateY(0); }

        @media (max-width: 580px) {
            .grid { grid-template-columns: 1fr; }
            .col-span-2 { grid-column: auto; }
            .actions { flex-direction: column-reverse; }
            .actions .btn-ghost, .actions .btn-primary { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

    <nav>
        <span class="nav-badge">Acara 29</span>
        <span class="nav-title">Upload &amp; Manipulasi Gambar Produk</span>
    </nav>

    <main class="page">

        <div class="hero">
            <h1>Tambah produk baru</h1>
            <p>Lengkapi informasi produk dan unggah gambar. Gambar diproses otomatis menjadi <strong>800 × 800 px</strong> menggunakan Intervention Image.</p>
        </div>

        @if ($errors->any())
            <div class="alert" role="alert" aria-live="polite">
                <span class="alert-icon">⚠</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert" style="border-color:rgb(52 211 153/.30);background:rgb(52 211 153/.08);color:#34d399" role="status">
                <span class="alert-icon">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('acara29.products.store') }}" enctype="multipart/form-data" id="product-form">
            @csrf

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">📦</div>
                    <div>
                        <h2>Informasi produk</h2>
                        <p>Data utama yang ditampilkan di halaman produk</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="grid">

                        <div class="field">
                            <label for="name">Nama produk</label>
                            <input id="name" name="name" value="{{ old('name') }}"
                                   placeholder="Contoh: Laptop Pro 14" required autocomplete="off">
                        </div>

                        <div class="field">
                            <label for="category_id">Kategori</label>
                            <select id="category_id" name="category_id" required>
                                <option value="">Pilih kategori…</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="field">
                            <label for="brand">Brand</label>
                            <input id="brand" name="brand" value="{{ old('brand') }}"
                                   placeholder="Contoh: Lenovo" required>
                        </div>

                        <div class="field">
                            <label for="slug">Slug <span class="badge-opt">opsional</span></label>
                            <input id="slug" name="slug" value="{{ old('slug') }}"
                                   placeholder="dibuat-otomatis-jika-kosong">
                        </div>

                        <div class="field">
                            <label for="price">Harga <small style="color:var(--muted)">(Rp)</small></label>
                            <input id="price" name="price" type="number" min="0" step="1"
                                   value="{{ old('price') }}" placeholder="0" required>
                        </div>

                        <div class="field">
                            <label for="stock">Stok <small style="color:var(--muted)">(unit)</small></label>
                            <input id="stock" name="stock" type="number" min="0"
                                   value="{{ old('stock', 0) }}" required>
                        </div>

                        <div class="col-span-2 field">
                            <label for="description">Deskripsi <span class="badge-opt">opsional</span></label>
                            <textarea id="description" name="description"
                                      placeholder="Tambahkan detail, keunggulan, atau catatan produk…">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-span-2 divider">Gambar produk</div>

                        <div class="col-span-2 field">
                            <label>Unggah gambar <span class="badge-opt">opsional</span></label>

                            <div id="preview-wrap">
                                <img id="preview-img" src="" alt="Preview">
                                <button type="button" class="remove-img" id="remove-img" title="Hapus gambar">✕</button>
                            </div>

                            <div class="upload-zone" id="upload-zone">
                                <input id="image" name="image" type="file"
                                       accept="image/jpeg,image/png,image/webp"
                                       aria-label="Unggah gambar produk">
                                <span class="upload-icon">🖼</span>
                                <span class="upload-label"><span>Klik untuk memilih</span> atau seret gambar ke sini</span>
                                <span class="upload-hint">JPG, PNG, WebP · Maks 2 MB · Output: 800 × 800 px</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="actions">
                    <a href="{{ route('products.index') }}" class="btn-ghost">Batal</a>
                    <button type="submit" class="btn-primary">
                        <span>Simpan produk</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>

    </main>

    <script>
        const input   = document.getElementById('image');
        const zone    = document.getElementById('upload-zone');
        const wrap    = document.getElementById('preview-wrap');
        const img     = document.getElementById('preview-img');
        const removeBtn = document.getElementById('remove-img');

        input.addEventListener('change', () => showPreview(input.files[0]));

        ['dragover', 'dragleave', 'drop'].forEach(e => zone.addEventListener(e, ev => ev.preventDefault()));
        zone.addEventListener('dragover',  () => zone.style.borderColor = 'var(--accent)');
        zone.addEventListener('dragleave', () => zone.style.borderColor = '');
        zone.addEventListener('drop', ev => {
            zone.style.borderColor = '';
            const file = ev.dataTransfer?.files?.[0];
            if (file) { const dt = new DataTransfer(); dt.items.add(file); input.files = dt.files; showPreview(file); }
        });

        removeBtn.addEventListener('click', () => {
            input.value = ''; img.src = '';
            wrap.style.display = 'none'; zone.style.display = '';
        });

        function showPreview(file) {
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => { img.src = e.target.result; wrap.style.display = 'block'; zone.style.display = 'none'; };
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>
