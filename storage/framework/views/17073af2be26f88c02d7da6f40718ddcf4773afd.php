<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('/admin/homepage/slider', ['images' => $images], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="separacao" class="w-full h-[2px]"></div>
    <?php echo $__env->make('/admin/homepage/empreendimentos', ['empreendimentos' => $empreendimentos], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views/admin/homepage/index.blade.php ENDPATH**/ ?>