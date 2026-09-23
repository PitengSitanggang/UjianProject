<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-bg min-h-screen flex items-center relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-black/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-yellow-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 grid lg:grid-cols-2 gap-12 items-center relative z-10">
        <!-- Left content -->
        <div class="animate-fadeInUp">
            <span class="inline-flex items-center bg-white/10 backdrop-blur text-yellow-200 text-sm font-medium px-4 py-2 rounded-full mb-6 border border-yellow-300/20">
                <i class="fas fa-star text-yellow-300 mr-2"></i> Khas Kalimantan Selatan
            </span>
            <h1 class="font-serif text-5xl md:text-7xl font-bold text-white leading-tight mb-6">
                Soto Banjar<br>
                <span class="text-yellow-300">Autentik</span>
            </h1>
            <p class="text-yellow-100/80 text-lg leading-relaxed mb-8 max-w-lg">
                Nikmati kelezatan Soto Banjar khas Kalimantan Selatan dengan resep turun-temurun. Kuah bening rempah yang kaya, daging ayam empuk, dan ketupat yang lembut.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#menu" class="btn-primary text-white font-bold px-8 py-4 rounded-full text-center shadow-2xl flex items-center justify-center gap-2">
                    <i class="fas fa-utensils"></i> Lihat Menu
                </a>
                <a href="#tentang" class="bg-white/10 backdrop-blur border border-white/30 text-white font-bold px-8 py-4 rounded-full text-center hover:bg-white/20 transition-all flex items-center justify-center gap-2">
                    <i class="fas fa-info-circle"></i> Tentang Kami
                </a>
            </div>
            <!-- Stats -->
            <div class="flex gap-8 mt-12">
                <div>
                    <div class="font-serif text-4xl font-bold text-yellow-300"><?= $totalMenu ?>+</div>
                    <div class="text-yellow-100/70 text-sm">Menu Tersedia</div>
                </div>
                <div class="border-l border-white/20 pl-8">
                    <div class="font-serif text-4xl font-bold text-yellow-300">15+</div>
                    <div class="text-yellow-100/70 text-sm">Tahun Pengalaman</div>
                </div>
                <div class="border-l border-white/20 pl-8">
                    <div class="font-serif text-4xl font-bold text-yellow-300">★ 4.9</div>
                    <div class="text-yellow-100/70 text-sm">Rating Pelanggan</div>
                </div>
            </div>
        </div>
        <!-- Right: Bowl Illustration -->
        <div class="hidden lg:flex justify-center items-center">
            <div class="float-anim relative">
                <div class="w-80 h-80 rounded-full bg-gradient-to-br from-yellow-400/20 to-transparent flex items-center justify-center">
                    <div class="w-64 h-64 rounded-full bg-white/10 backdrop-blur flex items-center justify-center border border-white/20 shadow-2xl">
                        <i class="fas fa-bowl-food text-yellow-300 text-9xl drop-shadow-2xl"></i>
                    </div>
                </div>
                <!-- Floating badges -->
                <div class="absolute -top-4 -left-4 bg-white/90 backdrop-blur rounded-2xl px-4 py-2 shadow-xl">
                    <div class="text-banjar font-bold text-sm">Rempah Asli</div>
                    <div class="text-gray-500 text-xs">100% Tradisional</div>
                </div>
                <div class="absolute -bottom-4 -right-4 bg-white/90 backdrop-blur rounded-2xl px-4 py-2 shadow-xl">
                    <div class="text-gold font-bold text-sm">⭐ Best Seller</div>
                    <div class="text-gray-500 text-xs">Soto Original</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/50 animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Search Section -->
<section id="menu" class="py-16 bg-cream/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-banjar font-semibold text-sm uppercase tracking-widest">Eksplorasi</span>
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-banjar-dark mt-2">Menu Kami</h2>
            <div class="section-divider w-32 mx-auto mt-4"></div>
        </div>

        <!-- Search bar -->
        <form action="<?= base_url('/') ?>" method="GET" class="max-w-2xl mx-auto mb-10">
            <div class="relative">
                <input 
                    type="text" 
                    name="search" 
                    value="<?= esc($keyword ?? '') ?>"
                    placeholder="Cari soto, lauk, minuman..."
                    class="w-full py-4 pl-14 pr-32 rounded-full border-2 border-banjar/20 bg-white shadow-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:border-banjar focus:ring-4 focus:ring-banjar/10 transition-all text-base"
                >
                <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-banjar/50 text-lg"></i>
                <button type="submit" class="btn-primary absolute right-2 top-1/2 -translate-y-1/2 text-white px-6 py-2.5 rounded-full font-semibold text-sm">
                    Cari
                </button>
            </div>
        </form>

        <?php if ($keyword): ?>
        <div class="text-center mb-6">
            <p class="text-gray-600">
                <?php if (!empty($menus)): ?>
                    Menampilkan <span class="font-bold text-banjar"><?= count($menus) ?> hasil</span> untuk 
                    "<span class="font-bold text-banjar-dark"><?= esc($keyword) ?></span>"
                <?php else: ?>
                    Tidak ada hasil untuk "<span class="font-bold text-banjar-dark"><?= esc($keyword) ?></span>"
                <?php endif; ?>
                &nbsp;·&nbsp; <a href="<?= base_url('/') ?>" class="text-banjar hover:underline">Lihat semua</a>
            </p>
        </div>
        <?php endif; ?>

        <?php if (empty($menus)): ?>
        <div class="text-center py-20">
            <i class="fas fa-bowl-food text-gray-200 text-7xl mb-4 block"></i>
            <p class="text-gray-400 text-xl font-medium">Menu tidak ditemukan</p>
            <a href="<?= base_url('/') ?>" class="mt-4 inline-block btn-primary text-white px-6 py-2 rounded-full text-sm">Lihat Semua Menu</a>
        </div>
        <?php else: ?>

        <!-- Category filter tabs -->
        <?php $kategoris = ['Soto', 'Lauk', 'Minuman', 'Dessert', 'Paket']; ?>
        <div class="flex flex-wrap gap-2 justify-center mb-10" id="filter-tabs">
            <button onclick="filterMenu('all')" class="filter-btn active-filter px-5 py-2 rounded-full font-semibold text-sm border-2 transition-all" data-filter="all">
                Semua
            </button>
            <?php foreach($kategoris as $k): ?>
            <button onclick="filterMenu('<?= $k ?>')" class="filter-btn px-5 py-2 rounded-full font-semibold text-sm border-2 border-banjar/30 text-banjar hover:bg-banjar hover:text-white transition-all" data-filter="<?= $k ?>">
                <?= $k ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Menu grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="menu-grid">
            <?php foreach($menus as $menu): ?>
            <div class="menu-card bg-white rounded-2xl overflow-hidden shadow-md card-hover border border-gray-100" data-kategori="<?= esc($menu['kategori']) ?>">
                <!-- Image -->
                <div class="relative h-48 bg-gradient-to-br from-cream to-yellow-50 flex items-center justify-center overflow-hidden">
                    <?php if ($menu['gambar'] && file_exists(FCPATH . 'uploads/menu/' . $menu['gambar'])): ?>
                        <img src="<?= base_url('uploads/menu/' . $menu['gambar']) ?>" alt="<?= esc($menu['nama_menu']) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="text-center">
                            <i class="fas fa-bowl-food text-banjar/30 text-6xl"></i>
                        </div>
                    <?php endif; ?>
                    <!-- Kategori badge -->
                    <span class="absolute top-3 left-3 badge-kategori text-white text-xs font-bold px-3 py-1 rounded-full">
                        <?= esc($menu['kategori']) ?>
                    </span>
                    <?php if (!$menu['is_available']): ?>
                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                        <span class="bg-red-500 text-white font-bold px-4 py-2 rounded-full text-sm">Habis</span>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- Content -->
                <div class="p-5">
                    <h3 class="font-serif font-bold text-banjar-dark text-lg mb-2 line-clamp-1"><?= esc($menu['nama_menu']) ?></h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-2"><?= esc($menu['deskripsi']) ?></p>
                    <div class="price-tag rounded-lg px-3 py-2 mb-4">
                        <span class="text-banjar-dark font-bold text-xl">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></span>
                    </div>
                    <a href="<?= base_url('/menu/' . $menu['id']) ?>" class="btn-primary w-full text-white text-sm font-semibold py-2.5 rounded-xl text-center block">
                        <i class="fas fa-eye mr-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- About Section -->
<section id="tentang" class="py-20 bg-banjar-dark text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-yellow-300 font-semibold text-sm uppercase tracking-widest">Tentang Kami</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold mt-3 mb-6 leading-tight">
                    Warisan Kuliner<br><span class="text-gold">Kalimantan Selatan</span>
                </h2>
                <p class="text-yellow-100/80 leading-relaxed mb-6">
                    Warung Sitanggang berdiri dengan satu misi: menghadirkan cita rasa Soto Banjar yang autentik dan memorable. Dengan resep yang telah teruji selama lebih dari 15 tahun, setiap mangkuk Soto Banjar kami adalah perpaduan sempurna antara tradisi dan kelezatan.
                </p>
                <p class="text-yellow-100/80 leading-relaxed mb-8">
                    Kami menggunakan rempah-rempah pilihan langsung dari petani lokal Kalimantan Selatan, memastikan setiap bahan yang kami gunakan segar dan berkualitas tinggi.
                </p>
                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center p-4 bg-white/5 rounded-xl border border-white/10">
                        <i class="fas fa-seedling text-gold text-3xl mb-2"></i>
                        <div class="font-bold text-sm">Rempah Segar</div>
                        <div class="text-yellow-100/50 text-xs">Lokal & Pilihan</div>
                    </div>
                    <div class="text-center p-4 bg-white/5 rounded-xl border border-white/10">
                        <i class="fas fa-fire-flame-curved text-gold text-3xl mb-2"></i>
                        <div class="font-bold text-sm">Dimasak Langsung</div>
                        <div class="text-yellow-100/50 text-xs">Setiap Hari</div>
                    </div>
                    <div class="text-center p-4 bg-white/5 rounded-xl border border-white/10">
                        <i class="fas fa-heart text-gold text-3xl mb-2"></i>
                        <div class="font-bold text-sm">Penuh Cinta</div>
                        <div class="text-yellow-100/50 text-xs">Resep Turun-temurun</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-banjar to-gold/50 rounded-3xl p-8 text-center">
                    <i class="fas fa-bowl-food text-white/20 text-[200px] absolute -bottom-8 -right-8"></i>
                    <div class="relative z-10">
                        <div class="font-serif text-7xl font-bold text-gold mb-2">15+</div>
                        <div class="text-xl font-semibold mb-4">Tahun Melayani</div>
                        <div class="flex justify-center gap-1 text-yellow-300 text-2xl mb-4">
                            ★★★★★
                        </div>
                        <p class="text-yellow-100/80 italic">"Soto Banjar terenak yang pernah saya makan, membawa kenangan kampung halaman."</p>
                        <p class="text-yellow-300 font-semibold mt-3 text-sm">— Pelanggan Setia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function filterMenu(kategori) {
    const cards = document.querySelectorAll('.menu-card');
    const btns = document.querySelectorAll('.filter-btn');
    
    btns.forEach(btn => {
        btn.classList.remove('active-filter', 'bg-banjar', 'text-white', 'border-banjar');
        btn.classList.add('border-banjar/30', 'text-banjar');
    });
    
    const activeBtn = document.querySelector(`[data-filter="${kategori}"]`);
    if (activeBtn) {
        activeBtn.classList.add('active-filter', 'bg-banjar', 'text-white', 'border-banjar');
        activeBtn.classList.remove('border-banjar/30', 'text-banjar');
    }
    
    cards.forEach(card => {
        if (kategori === 'all' || card.dataset.kategori === kategori) {
            card.style.display = 'block';
            card.style.animation = 'fadeInUp 0.4s ease forwards';
        } else {
            card.style.display = 'none';
        }
    });
}

// Initialize active filter button styling
document.addEventListener('DOMContentLoaded', function() {
    const allBtn = document.querySelector('[data-filter="all"]');
    if (allBtn) {
        allBtn.classList.add('bg-banjar', 'text-white', 'border-banjar');
        allBtn.classList.remove('border-banjar/30', 'text-banjar');
    }
});
</script>

<?= $this->endSection() ?>
