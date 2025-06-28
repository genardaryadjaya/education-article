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
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total Artikel</div>
                    <div class="text-3xl font-bold"><?php echo e(\App\Models\Artikel::count()); ?></div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Artikel Published</div>
                    <div class="text-3xl font-bold"><?php echo e(\App\Models\Artikel::whereNotNull('published_at')->count()); ?></div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total Kategori</div>
                    <div class="text-3xl font-bold"><?php echo e(\App\Models\Kategori::count()); ?></div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total User</div>
                    <div class="text-3xl font-bold"><?php echo e(\App\Models\User::count()); ?></div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total Admin</div>
                    <div class="text-3xl font-bold"><?php echo e(\App\Models\User::where('level', 'admin')->count()); ?></div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Artikel Draft</div>
                    <div class="text-3xl font-bold"><?php echo e(\App\Models\Artikel::whereNull('published_at')->count()); ?></div>
                </div>
            </div>
            <div class="bg-white rounded shadow p-6 mt-6">
                <div class="text-lg font-semibold mb-2">Jumlah Artikel per Kategori</div>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Jumlah Artikel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = \App\Models\Kategori::withCount('artikels')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-4 py-2"><?php echo e($kategori->nama); ?></td>
                            <td class="px-4 py-2"><?php echo e($kategori->artikels_count); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php endif; ?>
<?php /**PATH C:\laragon\www\manajemendatasiswa\resources\views/dashboard.blade.php ENDPATH**/ ?>