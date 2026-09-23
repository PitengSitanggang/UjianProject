<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Warung Sitanggang - Soto Banjar Khas Kalimantan Selatan. Menikmati kelezatan autentik dalam setiap mangkuk.">
    <title><?= esc($title ?? 'Warung Sitanggang') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream:  '#F5F5DC',
                        banjar: '#92400E',
                        'banjar-light': '#B45309',
                        'banjar-dark':  '#6B2D0A',
                        gold:   '#D97706',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FDFAF4; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .hero-bg {
            background: linear-gradient(135deg, #6B2D0A 0%, #92400E 40%, #B45309 70%, #D97706 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(146,64,14,0.25);
        }
        .nav-glass {
            background: rgba(107, 45, 10, 0.95);
            backdrop-filter: blur(20px);
        }
        .badge-kategori {
            background: linear-gradient(135deg, #92400E, #D97706);
        }
        .btn-primary {
            background: linear-gradient(135deg, #92400E, #D97706);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #6B2D0A, #B45309);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(146,64,14,0.4);
        }
        .price-tag {
            background: linear-gradient(135deg, #FEF3C7, #FDE68A);
            border-left: 4px solid #D97706;
        }
        .section-divider {
            background: linear-gradient(90deg, transparent, #92400E, transparent);
            height: 1px;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp { animation: fadeInUp 0.6s ease forwards; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .float-anim { animation: float 3s ease-in-out infinite; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="nav-glass fixed top-0 left-0 right-0 z-50 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="<?= base_url('/') ?>" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold to-yellow-300 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-bowl-food text-banjar-dark text-lg"></i>
                </div>
                <div>
                    <span class="text-white font-serif font-bold text-xl leading-none block">Warung Sitanggang</span>
                    <span class="text-yellow-300 text-xs font-medium">Soto Banjar Khas Kalsel</span>
                </div>
            </a>
            <div class="hidden md:flex items-center space-x-6">
                <a href="<?= base_url('/') ?>" class="text-yellow-100 hover:text-yellow-300 font-medium transition-colors">Menu</a>
                <a href="<?= base_url('/') ?>#tentang" class="text-yellow-100 hover:text-yellow-300 font-medium transition-colors">Tentang</a>
                <a href="<?= base_url('/login') ?>" class="bg-gold hover:bg-yellow-500 text-white px-4 py-2 rounded-full font-semibold text-sm transition-all hover:shadow-lg">
                    <i class="fas fa-lock mr-1"></i> Admin
                </a>
            </div>
            <!-- Mobile menu button -->
            <button class="md:hidden text-white" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-banjar-dark px-4 pb-4">
        <a href="<?= base_url('/') ?>" class="block text-yellow-100 py-2 font-medium">Menu</a>
        <a href="<?= base_url('/') ?>#tentang" class="block text-yellow-100 py-2 font-medium">Tentang</a>
        <a href="<?= base_url('/login') ?>" class="block text-yellow-300 py-2 font-semibold">Admin Login</a>
    </div>
</nav>

<!-- Main Content -->
<main class="pt-16">
    <?= $this->renderSection('content') ?>
</main>

<!-- Footer -->
<footer class="bg-banjar-dark text-white mt-20">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold to-yellow-300 flex items-center justify-center">
                        <i class="fas fa-bowl-food text-banjar-dark text-lg"></i>
                    </div>
                    <div>
                        <span class="font-serif font-bold text-xl block">Warung Sitanggang</span>
                        <span class="text-yellow-300 text-xs">Soto Banjar Khas Kalsel</span>
                    </div>
                </div>
                <p class="text-yellow-100/70 text-sm leading-relaxed">Menghadirkan cita rasa autentik Soto Banjar dari tanah Kalimantan Selatan dengan resep turun-temurun yang tak lekang oleh waktu.</p>
            </div>
            <div>
                <h4 class="font-bold text-gold mb-4 uppercase tracking-wider text-sm">Informasi</h4>
                <ul class="space-y-2 text-yellow-100/70 text-sm">
                    <li><i class="fas fa-map-marker-alt mr-2 text-gold"></i> Banjarmasin, Kalimantan Selatan</li>
                    <li><i class="fas fa-clock mr-2 text-gold"></i> Buka: 07.00 - 21.00 WIB</li>
                    <li><i class="fas fa-phone mr-2 text-gold"></i> +62 812-3456-7890</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gold mb-4 uppercase tracking-wider text-sm">Kategori Menu</h4>
                <div class="flex flex-wrap gap-2">
                    <?php foreach(['Soto', 'Lauk', 'Minuman', 'Dessert', 'Paket'] as $kat): ?>
                    <a href="<?= base_url('/?search=' . $kat) ?>" class="bg-banjar/50 hover:bg-banjar text-yellow-100 text-xs px-3 py-1 rounded-full transition-colors"><?= $kat ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 mt-8 pt-6 text-center text-yellow-100/50 text-sm">
            <p>&copy; <?= date('Y') ?> Warung Sitanggang. Semua hak dilindungi. 🍜</p>
        </div>
    </div>
</footer>

</body>
</html>
