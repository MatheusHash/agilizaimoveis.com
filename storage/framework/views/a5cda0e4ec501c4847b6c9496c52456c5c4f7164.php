

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.localidades.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="bg-gray-800 rounded-b-2xl">

            <div id="div1"></div>
        <div class="w-full p-6 mt-4">

            <div class="border-indigo-500  w-full" >
                <?php if($municipios): ?>
                    <h1 class="text-center text-gray-400 font-semibold text-2xl border-solid border-b-2 border-gray-400" >Municípios e Bairros</h1>

                <div class="mt-6">
                    <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h1 class="text-[26px] text-white font-medium p-2"><?php echo e($municipio->nome); ?></h1>
                        <div class="grid grid-cols-4 border-solid  border-b-blue-400">
                            <?php $__empty_1 = true; $__currentLoopData = $municipio->bairros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bairro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <span class="text-gray-300 text-[18px] gap-2 p-2 flex"><?php echo e($key+1); ?> - <h4 class="text-"><?php echo e($bairro->nome); ?></h4></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="bg-red-700  rounded-lg text-white p-2">Nenhum bairro cadastrado!</p>
                            <?php endif; ?>
                        </div>

                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php endif; ?>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views/admin/localidades/index.blade.php ENDPATH**/ ?>