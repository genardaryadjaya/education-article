<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Artikel
        </h2>
     <?php $__env->endSlot(); ?>
    <div class="container mx-auto py-4">
        <div class="max-w-4xl mx-auto bg-white rounded shadow overflow-hidden">
            <?php if($artikel->gambar): ?>
                <img src="<?php echo e($artikel->gambar_url); ?>" alt="<?php echo e($artikel->judul); ?>" class="w-full h-64 object-cover">
            <?php endif; ?>
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4"><?php echo e($artikel->judul); ?></h1>
                <div class="flex items-center text-gray-600 mb-4">
                    <span class="mr-4">Kategori: <?php echo e($artikel->kategori->nama); ?></span>
                    <span class="mr-4">Penulis: <?php echo e($artikel->user->name); ?></span>
                    <?php if($artikel->published_at): ?>
                        <span>Dipublish: <?php echo e($artikel->published_at->format('d M Y H:i')); ?></span>
                    <?php else: ?>
                        <span class="text-yellow-600">Draft</span>
                    <?php endif; ?>
                </div>
                <div class="prose max-w-none">
                    <?php echo nl2br(e($artikel->isi)); ?>

                </div>
                <div class="mt-6 pt-4 border-t">
                    <a href="<?php echo e(route('artikel.index')); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                    <?php if(Auth::user()->level === 'admin' || Auth::id() === $artikel->user_id): ?>
                        <a href="<?php echo e(route('artikel.edit', $artikel)); ?>" class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded ml-2">Edit</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?> <?php /**PATH C:\laragon\www\manajemendatasiswa\resources\views/artikel/show.blade.php ENDPATH**/ ?>