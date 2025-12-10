

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.categorias.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="bg-gray-800 rounded-b-2xl h-80 ">
    <div class="border-indigo-500 ml-12">
        <?php if($categorias): ?>
            <h1 class="mt-6 mb-8 text-center text-gray-400 font-semibold text-2xl border-solid border-b-2 border-gray-400" >Tags cadastradas</h1>

            <div class="grid grid-cols-4 border-solid  border-b-blue-400">
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="text-gray-300 text-[18px] gap-2 p-2 flex"><?php echo e($key+1); ?> - <h4 class="text-"><?php echo e($categoria->nome); ?></h4></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views/admin/categorias/categoria.blade.php ENDPATH**/ ?>