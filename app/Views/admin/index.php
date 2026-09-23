<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Dashboard') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        banjar: '#92400E', 'banjar-light': '#B45309', 'banjar-dark': '#6B2D0A', gold: '#D97706', cream: '#F5F5DC',
                    },
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'], serif: ['Playfair Display', 'serif'] }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #F8F4EF; }
        .sidebar { background: linear-gradient(180deg, #6B2D0A 0%, #92400E 100%); }
        .btn-primary { background: linear-gradient(135deg, #92400E, #D97706); transition: all 0.3s ease; }
        .btn-primary:hover { background: linear-gradient(135deg, #6B2D0A, #B45309); transform: translateY(-1px); }
        .stat-card { transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .table-row:hover { background-color: #FEF3C7; }
    </style>
</head>
<body>
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="sidebar w-64 flex-shrink-0 flex flex-col">
        <!-- Logo -->
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

        <!-- Nav -->
        <nav class="flex-1 p-4 space-y-1">
            <a href="<?= base_url('/admin') ?>" class="flex items-center gap-3 text-white bg-white/20 px-4 py-3 rounded-xl font-semibold text-sm">
                <i class="fas fa-grid-2 w-4 text-center text-yellow-300"></i> Dashboard
            </a>
            <a href="<?= base_url('/admin/create') ?>" class="flex items-center gap-3 text-yellow-100/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl font-medium text-sm transition-all">
                <i class="fas fa-plus w-4 text-center"></i> Tambah Menu
            </a>
            <a href="<?= base_url('/') ?>" target="_blank" class="flex items-center gap-3 text-yellow-100/80 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl font-medium text-sm transition-all">
                <i class="fas fa-globe w-4 text-center"></i> Lihat Website
            </a>
        </nav>

        <!-- User info -->
        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-full bg-yellow-400 flex items-center justify-center">
                    <i class="fas fa-user text-banjar-dark text-sm"></i>
                </div>
                <div>
                    <div class="text-white font-semibold text-sm"><?= esc(session()->get('admin_nama')) ?></div>
                    <div class="text-yellow-300 text-xs">Administrator</div>
                </div>
            </div>
            <a href="<?= base_url('/logout') ?>" class="flex items-center gap-2 text-red-300 hover:text-red-200 text-sm font-medium transition-colors">
                <i class="fas fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-white shadow-sm px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="font-serif text-2xl font-bold text-banjar-dark">Dashboard</h1>
                <p class="text-gray-500 text-sm">Kelola menu Warung Sitanggang</p>
            </div>
            <a href="<?= base_url('/admin/create') ?>" class="btn-primary text-white px-5 py-2.5 rounded-xl font-semibold text-sm flex items-center gap-2 shadow-lg">
                <i class="fas fa-plus"></i> Tambah Menu
            </a>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-8">
            <!-- Alerts -->
            <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
                <i class="fas fa-circle-check text-green-500 text-lg"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
                <i class="fas fa-circle-exclamation text-red-500 text-lg"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
            <?php endif; ?>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                <div class="stat-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Menu</p>
                            <p class="font-serif text-4xl font-bold text-banjar-dark mt-1"><?= $total ?></p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-banjar to-gold rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-bowl-food text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="stat-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Menu Tersedia</p>
                            <p class="font-serif text-4xl font-bold text-green-600 mt-1"><?= $available ?></p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-circle-check text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="stat-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Menu Habis</p>
                            <p class="font-serif text-4xl font-bold text-red-500 mt-1"><?= $total - $available ?></p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-circle-xmark text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search & Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <h2 class="font-serif font-bold text-banjar-dark text-xl">Daftar Menu</h2>
                    <form action="<?= base_url('/admin') ?>" method="GET" class="flex gap-2">
                        <div class="relative">
                            <input type="text" name="search" value="<?= esc($keyword ?? '') ?>"
                                placeholder="Cari menu..."
                                class="pl-10 pr-4 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-banjar focus:ring-2 focus:ring-banjar/10 transition-all">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        </div>
                        <button type="submit" class="btn-primary text-white px-4 py-2 rounded-xl text-sm font-semibold">Cari</button>
                        <?php if ($keyword): ?>
                        <a href="<?= base_url('/admin') ?>" class="bg-gray-100 text-gray-600 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-gray-200 transition-colors">Reset</a>
                        <?php endif; ?>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 text-left">
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Menu</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <?php if (empty($menus)): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-gray-400">
                                    <i class="fas fa-inbox text-4xl mb-3 block"></i>
                                    <p>Tidak ada menu ditemukan</p>
                                    <a href="<?= base_url('/admin/create') ?>" class="mt-3 inline-block btn-primary text-white px-4 py-2 rounded-xl text-sm">Tambah Menu</a>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($menus as $i => $m): ?>
                            <tr class="table-row transition-colors">
                                <td class="px-6 py-4 text-gray-500 text-sm font-mono"><?= $i + 1 ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cream to-yellow-50 flex items-center justify-center flex-shrink-0 border border-yellow-100">
                                            <?php if ($m['gambar'] && file_exists(FCPATH . 'uploads/menu/' . $m['gambar'])): ?>
                                            <img src="<?= base_url('uploads/menu/' . $m['gambar']) ?>" class="w-full h-full object-cover rounded-xl">
                                            <?php else: ?>
                                            <i class="fas fa-bowl-food text-banjar/40 text-sm"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800 text-sm"><?= esc($m['nama_menu']) ?></div>
                                            <div class="text-gray-400 text-xs line-clamp-1 max-w-xs"><?= esc(substr($m['deskripsi'], 0, 50)) ?>...</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-amber-100 text-amber-800 text-xs font-semibold px-3 py-1 rounded-full"><?= esc($m['kategori']) ?></span>
                                </td>
                                <td class="px-6 py-4 font-bold text-banjar-dark text-sm">Rp <?= number_format($m['harga'], 0, ',', '.') ?></td>
                                <td class="px-6 py-4">
                                    <?php if ($m['is_available']): ?>
                                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1 w-fit">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Tersedia
                                    </span>
                                    <?php else: ?>
                                    <span class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1 w-fit">
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span> Habis
                                    </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('/menu/' . $m['id']) ?>" target="_blank" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors" title="Preview">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url('/admin/edit/' . $m['id']) ?>" class="p-2 text-gold hover:bg-yellow-50 rounded-lg transition-colors" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button onclick="confirmDelete(<?= $m['id'] ?>, '<?= esc($m['nama_menu']) ?>')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-sm w-full p-8 text-center">
        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-triangle-exclamation text-red-500 text-2xl"></i>
        </div>
        <h3 class="font-serif text-xl font-bold text-gray-800 mb-2">Hapus Menu?</h3>
        <p class="text-gray-500 text-sm mb-6">Menu "<span id="delete-menu-name" class="font-semibold text-red-600"></span>" akan dihapus permanen.</p>
        <div class="flex gap-3">
            <button onclick="closeModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 rounded-xl transition-colors">Batal</button>
            <a id="delete-link" href="#" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-xl transition-colors">Ya, Hapus</a>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, name) {
    document.getElementById('delete-menu-name').textContent = name;
    document.getElementById('delete-link').href = '<?= base_url('/admin/delete/') ?>' + id;
    document.getElementById('delete-modal').classList.remove('hidden');
    document.getElementById('delete-modal').classList.add('flex');
}
function closeModal() {
    document.getElementById('delete-modal').classList.add('hidden');
    document.getElementById('delete-modal').classList.remove('flex');
}
document.getElementById('delete-modal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>
</body>
</html>
