<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Tambah Menu') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{colors:{banjar:'#92400E','banjar-light':'#B45309','banjar-dark':'#6B2D0A',gold:'#D97706',cream:'#F5F5DC'},fontFamily:{sans:['Plus Jakarta Sans','sans-serif'],serif:['Playfair Display','serif']}}}}</script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body{font-family:'Plus Jakarta Sans',sans-serif;background:#F8F4EF;}
        .sidebar{background:linear-gradient(180deg,#6B2D0A 0%,#92400E 100%);}
        .btn-primary{background:linear-gradient(135deg,#92400E,#D97706);transition:all 0.3s ease;}
        .btn-primary:hover{background:linear-gradient(135deg,#6B2D0A,#B45309);transform:translateY(-1px);}
        .input-focus:focus{border-color:#92400E;box-shadow:0 0 0 4px rgba(146,64,14,0.1);}
    </style>
</head>
<body>
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="sidebar w-64 flex-shrink-0 flex flex-col">
        <div class="p-6 border-b border-white/10">
            <a href="<?= base_url('/') ?>" class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-300 flex items-center justify-center shadow-lg">
                    <i class="fas fa-bowl-food text-banjar-dark text-lg"></i>
                </div>
                <div>
                    <div class="text-white font-serif font-bold text-base leading-none">Warung Sitanggang</div>
                    <div class="text-yellow-300 text-xs">Admin Panel</div>
                </div>
            </a>
        </div>
        <nav class="flex-1 p-4 space-y-1">
            <a href="<?= base_url('/admin') ?>" class="flex items-center gap-3 text-yellow-100/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl font-medium text-sm transition-all">
                <i class="fas fa-grid-2 w-4 text-center"></i> Dashboard
            </a>
            <a href="<?= base_url('/admin/create') ?>" class="flex items-center gap-3 text-white bg-white/20 px-4 py-3 rounded-xl font-semibold text-sm">
                <i class="fas fa-plus w-4 text-center text-yellow-300"></i> Tambah Menu
            </a>
            <a href="<?= base_url('/') ?>" target="_blank" class="flex items-center gap-3 text-yellow-100/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl font-medium text-sm transition-all">
                <i class="fas fa-globe w-4 text-center"></i> Lihat Website
            </a>
        </nav>
        <div class="p-4 border-t border-white/10">
            <a href="<?= base_url('/logout') ?>" class="flex items-center gap-2 text-red-300 hover:text-red-200 text-sm font-medium transition-colors">
                <i class="fas fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white shadow-sm px-8 py-4 flex items-center gap-4">
            <a href="<?= base_url('/admin') ?>" class="text-gray-400 hover:text-banjar transition-colors">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="font-serif text-2xl font-bold text-banjar-dark">Tambah Menu Baru</h1>
                <p class="text-gray-500 text-sm">Isi form di bawah dengan detail menu</p>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8">
            <?php $errors = session()->getFlashdata('errors'); ?>
            <?php if ($errors): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl mb-6">
                <p class="font-semibold mb-2 flex items-center gap-2"><i class="fas fa-circle-exclamation"></i> Terdapat kesalahan:</p>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <?php foreach ($errors as $err): ?>
                    <li><?= esc($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 max-w-2xl">
                <div class="p-8">
                    <form action="<?= base_url('/admin/store') ?>" method="POST" enctype="multipart/form-data" novalidate>
                        <?= csrf_field() ?>

                        <!-- Nama Menu -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Menu <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_menu" value="<?= old('nama_menu') ?>"
                                placeholder="Contoh: Soto Banjar Original"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl outline-none transition-all text-gray-800">
                            <?php if (isset($errors['nama_menu'])): ?>
                            <p class="text-red-500 text-xs mt-1"><i class="fas fa-circle-exclamation mr-1"></i><?= $errors['nama_menu'] ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                            <select name="kategori" class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl outline-none transition-all text-gray-800 bg-white appearance-none">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach(['Soto', 'Lauk', 'Minuman', 'Dessert', 'Paket'] as $k): ?>
                                <option value="<?= $k ?>" <?= old('kategori') === $k ? 'selected' : '' ?>><?= $k ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                            <textarea name="deskripsi" rows="4"
                                placeholder="Deskripsi menu, bahan utama, keunggulan produk..."
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl outline-none transition-all text-gray-800 resize-none"><?= old('deskripsi') ?></textarea>
                        </div>

                        <!-- Harga -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">Rp</span>
                                <input type="number" name="harga" value="<?= old('harga') ?>" min="0"
                                    placeholder="35000"
                                    class="input-focus w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl outline-none transition-all text-gray-800">
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Menu <span class="text-gray-400 font-normal">(opsional, max 2MB)</span></label>
                            <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-banjar transition-colors cursor-pointer" onclick="document.getElementById('gambar').click()">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-300 mb-2 block"></i>
                                <p class="text-gray-400 text-sm">Klik untuk upload gambar</p>
                                <p class="text-gray-300 text-xs mt-1">JPG, PNG, WebP</p>
                                <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden" onchange="previewImage(this)">
                            </div>
                            <div id="img-preview" class="hidden mt-3">
                                <img id="preview-img" src="" alt="preview" class="max-h-40 rounded-xl object-cover shadow-md">
                            </div>
                        </div>

                        <!-- Ketersediaan -->
                        <div class="mb-8">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <div class="relative">
                                    <input type="checkbox" name="is_available" value="1" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-banjar transition-colors peer-focus:ring-2 peer-focus:ring-banjar/20"></div>
                                    <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Menu Tersedia</span>
                            </label>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-3 pt-4 border-t border-gray-100">
                            <a href="<?= base_url('/admin') ?>" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 rounded-xl transition-colors">
                                Batal
                            </a>
                            <button type="submit" class="flex-1 btn-primary text-white font-bold py-3 rounded-xl shadow-lg">
                                <i class="fas fa-plus mr-2"></i> Tambah Menu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('img-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>
