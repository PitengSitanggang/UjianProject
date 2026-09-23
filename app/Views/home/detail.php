<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="min-h-screen bg-cream/30 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-8 flex items-center space-x-2 text-sm text-gray-500">
            <a href="<?= base_url('/') ?>" class="hover:text-banjar transition-colors"><i class="fas fa-home"></i> Beranda</a>
            <span>/</span>
            <span class="text-banjar-dark font-medium"><?= esc($menu['nama_menu']) ?></span>
        </nav>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid lg:grid-cols-2">
                <!-- Image -->
                <div class="bg-gradient-to-br from-cream to-yellow-50 min-h-72 flex items-center justify-center p-8 relative">
                    <?php if ($menu['gambar'] && file_exists(FCPATH . 'uploads/menu/' . $menu['gambar'])): ?>
                        <img src="<?= base_url('uploads/menu/' . $menu['gambar']) ?>" alt="<?= esc($menu['nama_menu']) ?>" class="w-full h-full object-cover rounded-2xl shadow-lg">
                    <?php else: ?>
                        <div class="text-center py-12">
                            <i class="fas fa-bowl-food text-banjar/20 text-[120px]"></i>
                        </div>
                    <?php endif; ?>
                    <span class="absolute top-6 left-6 badge-kategori text-white text-sm font-bold px-4 py-1.5 rounded-full">
                        <?= esc($menu['kategori']) ?>
                    </span>
                    <?php if (!$menu['is_available']): ?>
                    <div class="absolute inset-0 bg-black/40 rounded-none flex items-center justify-center">
                        <span class="bg-red-500 text-white font-bold px-6 py-3 rounded-full text-lg">Sedang Habis</span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Detail -->
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <h1 class="font-serif text-3xl md:text-4xl font-bold text-banjar-dark mb-4"><?= esc($menu['nama_menu']) ?></h1>
                    
                    <div class="price-tag rounded-xl px-5 py-3 mb-6 inline-block">
                        <span class="text-2xl md:text-3xl font-bold text-banjar-dark">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></span>
                    </div>

                    <p class="text-gray-600 leading-relaxed mb-6 text-base"><?= nl2br(esc($menu['deskripsi'])) ?></p>

                    <div class="flex items-center gap-3 mb-8">
                        <span class="flex items-center gap-2 text-sm <?= $menu['is_available'] ? 'text-green-600' : 'text-red-500' ?>">
                            <span class="w-2.5 h-2.5 rounded-full <?= $menu['is_available'] ? 'bg-green-500' : 'bg-red-500' ?> inline-block"></span>
                            <?= $menu['is_available'] ? 'Tersedia' : 'Habis' ?>
                        </span>
                        <span class="text-gray-300">|</span>
                        <span class="text-sm text-gray-500"><i class="fas fa-tag mr-1 text-banjar/50"></i><?= esc($menu['kategori']) ?></span>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="<?= base_url('/') ?>" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-xl transition-all">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        <a href="<?= base_url('/') ?>#menu" class="flex-1 btn-primary text-white font-semibold py-3 px-6 rounded-xl text-center">
                            <i class="fas fa-utensils mr-2"></i> Menu Lainnya
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Menu -->
        <?php if (!empty($related)): ?>
        <div class="mt-16">
            <h2 class="font-serif text-2xl font-bold text-banjar-dark mb-6">Menu Serupa</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <?php foreach ($related as $rel): ?>
                <a href="<?= base_url('/menu/' . $rel['id']) ?>" class="bg-white rounded-2xl shadow-md card-hover overflow-hidden block">
                    <div class="h-40 bg-gradient-to-br from-cream to-yellow-50 flex items-center justify-center">
                        <?php if ($rel['gambar'] && file_exists(FCPATH . 'uploads/menu/' . $rel['gambar'])): ?>
                            <img src="<?= base_url('uploads/menu/' . $rel['gambar']) ?>" alt="<?= esc($rel['nama_menu']) ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <i class="fas fa-bowl-food text-banjar/20 text-5xl"></i>
                        <?php endif; ?>
                    </div>
                    <div class="p-4">
                        <h3 class="font-serif font-bold text-banjar-dark"><?= esc($rel['nama_menu']) ?></h3>
                        <p class="text-gold font-semibold mt-1">Rp <?= number_format($rel['harga'], 0, ',', '.') ?></p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
