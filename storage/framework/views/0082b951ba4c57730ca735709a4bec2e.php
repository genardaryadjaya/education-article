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
            Daftar Artikel
        </h2>
     <?php $__env->endSlot(); ?>
    <div class="container mx-auto py-4">
        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <a href="<?php echo e(route('artikel.create')); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">+ Tambah Artikel</a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded shadow overflow-hidden">
                <img src="<?php echo e($artikel->gambar_url); ?>" alt="<?php echo e($artikel->judul); ?>" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2"><?php echo e($artikel->judul); ?></h3>
                    <p class="text-gray-600 text-sm mb-2">
                        Kategori: <?php echo e($artikel->kategori->nama); ?> | 
                        Penulis: <?php echo e($artikel->user->name); ?>

                    </p>
                    <p class="text-gray-500 text-sm mb-3">
                        <?php echo e(Str::limit($artikel->isi, 100)); ?>

                    </p>
                    <div class="flex items-center justify-between">
                        <span class="px-2 py-1 text-xs rounded <?php echo e($artikel->published_at ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                            <?php echo e($artikel->published_at ? 'Published' : 'Draft'); ?>

                        </span>
                        <div class="flex gap-2">
                            <a href="<?php echo e(route('artikel.show', $artikel)); ?>" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded text-sm">Lihat</a>
                            <a href="<?php echo e(route('artikel.edit', $artikel)); ?>" class="bg-yellow-400 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm">Edit</a>
                            <?php if($artikel->published_at): ?>
                                <form action="<?php echo e(route('artikel.unpublish', $artikel)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white py-1 px-3 rounded text-sm">Unpublish</button>
                                </form>
                            <?php else: ?>
                                <form action="<?php echo e(route('artikel.publish', $artikel)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded text-sm">Publish</button>
                                </form>
                            <?php endif; ?>
                            <form action="<?php echo e(route('artikel.destroy', $artikel)); ?>" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?> <?php /**PATH C:\laragon\www\manajemendatasiswa\resources\views/artikel/index.blade.php ENDPATH**/ ?>