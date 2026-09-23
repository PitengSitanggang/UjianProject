<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login Admin') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        banjar: '#92400E',
                        'banjar-light': '#B45309',
                        'banjar-dark':  '#6B2D0A',
                        gold: '#D97706',
                        cream: '#F5F5DC',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-hero { background: linear-gradient(135deg, #6B2D0A 0%, #92400E 50%, #D97706 100%); }
        .input-focus:focus { border-color: #92400E; box-shadow: 0 0 0 4px rgba(146,64,14,0.1); }
        .btn-login { background: linear-gradient(135deg, #92400E, #D97706); }
        .btn-login:hover { background: linear-gradient(135deg, #6B2D0A, #B45309); transform: translateY(-2px); box-shadow: 0 10px 30px rgba(146,64,14,0.4); }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animate-in { animation: fadeInUp 0.6s ease forwards; }
    </style>
</head>
<body class="bg-hero min-h-screen flex items-center justify-center p-4">

    <!-- Background decorative elements -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-black/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-yellow-500/10 rounded-full blur-2xl"></div>
    </div>

    <div class="relative z-10 w-full max-w-md animate-in">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="<?= base_url('/') ?>" class="inline-flex items-center space-x-3 group">
                <div class="w-14 h-14 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-300 flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-bowl-food text-banjar-dark text-2xl"></i>
                </div>
                <div class="text-left">
                    <div class="text-white font-serif font-bold text-2xl leading-none">Warung Sitanggang</div>
                    <div class="text-yellow-300 text-sm">Panel Admin</div>
                </div>
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-banjar to-gold rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
                <h1 class="font-serif text-2xl font-bold text-banjar-dark">Masuk ke Dashboard</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola menu Warung Sitanggang</p>
            </div>

            <!-- Alerts -->
            <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                <i class="fas fa-circle-exclamation text-red-500"></i>
                <span class="text-sm"><?= session()->getFlashdata('error') ?></span>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                <i class="fas fa-circle-check text-green-500"></i>
                <span class="text-sm"><?= session()->getFlashdata('success') ?></span>
            </div>
            <?php endif; ?>
            <?php $errors = session()->getFlashdata('errors'); ?>

            <!-- Form -->
            <form action="<?= base_url('/login') ?>" method="POST" novalidate>
                <?= csrf_field() ?>

                <!-- Username -->
                <div class="mb-5">
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-1 text-banjar/60"></i> Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        value="<?= old('username') ?>"
                        placeholder="Masukkan username"
                        class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl outline-none transition-all text-gray-800 <?= isset($errors['username']) ? 'border-red-400 bg-red-50' : '' ?>"
                        required
                    >
                    <?php if (isset($errors['username'])): ?>
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <i class="fas fa-circle-exclamation"></i> <?= $errors['username'] ?>
                    </p>
                    <?php endif; ?>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-1 text-banjar/60"></i> Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            placeholder="Masukkan password"
                            class="input-focus w-full px-4 py-3 pr-12 border-2 border-gray-200 rounded-xl outline-none transition-all text-gray-800 <?= isset($errors['password']) ? 'border-red-400 bg-red-50' : '' ?>"
                            required
                        >
                        <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-banjar transition-colors">
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <i class="fas fa-circle-exclamation"></i> <?= $errors['password'] ?>
                    </p>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-login w-full text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300">
                    <i class="fas fa-right-to-bracket mr-2"></i> Masuk Sekarang
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="<?= base_url('/') ?>" class="text-sm text-gray-500 hover:text-banjar transition-colors">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>

        <p class="text-center text-white/50 text-xs mt-6">&copy; <?= date('Y') ?> Warung Sitanggang</p>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                pwd.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
