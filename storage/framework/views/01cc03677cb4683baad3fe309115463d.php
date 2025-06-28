<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Website Artikel Edukasi</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-gray-900">Website Artikel Edukasi</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/dashboard')); ?>" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="text-gray-600 hover:text-gray-900">Login</a>
                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>" class="text-gray-600 hover:text-gray-900">Register</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-4">Selamat Datang di Website Artikel Edukasi</h2>
                <p class="text-xl mb-8">Temukan artikel-artikel edukasi yang informatif dan bermanfaat</p>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('register')); ?>" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-200">
                        Mulai Menulis Artikel
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Articles Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">Artikel Terbaru</h3>
            
            <?php if($artikels->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                            <?php if($artikel->gambar): ?>
                                <img src="<?php echo e($artikel->gambar_url); ?>" alt="<?php echo e($artikel->judul); ?>" class="w-full h-48 object-cover">
                            <?php else: ?>
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs"><?php echo e($artikel->kategori->nama); ?></span>
                                    <span class="ml-2"><?php echo e($artikel->published_at->format('d M Y')); ?></span>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900 mb-2"><?php echo e($artikel->judul); ?></h4>
                                <p class="text-gray-600 mb-4"><?php echo e(Str::limit($artikel->isi, 120)); ?></p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">Oleh: <?php echo e($artikel->user->name); ?></span>
                                    <a href="<?php echo e(route('artikel.show', $artikel)); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-200">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <div class="text-gray-400 text-6xl mb-4">📝</div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Belum ada artikel</h4>
                    <p class="text-gray-600 mb-6">Jadilah yang pertama menulis artikel edukasi!</p>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('artikel.create')); ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                            Tulis Artikel Pertama
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('register')); ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                            Daftar dan Mulai Menulis
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p>&copy; <?php echo e(date('Y')); ?> Website Artikel Edukasi. Dibuat dengan Laravel.</p>
            </div>
        </footer>
    </body>
</html>
<?php /**PATH C:\laragon\www\manajemendatasiswa\resources\views/welcome.blade.php ENDPATH**/ ?>