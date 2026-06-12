

<?php $__env->startSection('content'); ?>

    <div class="bg-gray-800 rounded-lg p-6" id="novas-imagens">
        <form action="<?php echo e(route('store.images')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="max-w-xl" id="form-galeria">
                <label for="imagens">Inserir imagens</label><br>
                <input type="hidden" name="imovel" value="<?php echo e($imovel); ?>">
                <input type="file" name="imagens[]" id="imagens" multiple>
                <p class="mt-3">Máximo de 5 imagens por vez</p>
                <?php if($errors->any()): ?>
                    <p class="mt-3 text-green-600">*Adicione as novas imagens</p>
                <?php endif; ?>
                <button type="submit" class="mt-3 btn btn-azul text-white w-full">Enviar</button>
            </div>
        </form>
        <a href="<?php echo e(route('imoveis.show')); ?>" class=" text-center m-auto mt-3 btn btn-cinza ">Voltar</a>
    </div>

    <h1 class="text-center text-green-600 font-semibold text-lg">Galeria de fotos</h1>

<div class="galeria">
    <?php $__currentLoopData = $imagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="card">
            <img src="<?php echo e(asset($image->path)); ?>" alt="Imagem" class="photo">

            <div class="caption">
                <?php if($image->principal): ?>
                    <p class="text-green-600 text-lg text-center font-semibold">Foto de capa</p>
                    
                <?php else: ?>
                    <div class="flex justify-between text-white btn-forms">
                        <form action="<?php echo e(route('imagemCapa.update', ['idImovel'=>$image->imovel_id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" class="hidden" name="idImovel" value="<?php echo e($image->imovel_id); ?>">
                            <input type="text" class="hidden" name="idImagem" value="<?php echo e($image->id); ?>">
                            <button type="submit" class="btn btn-azul">Colocar na capa</button>
                        </form>

                        <form action="<?php echo e(route('imagem.destroy', ['idImagem'=>$image->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="text" class="hidden" name="path" value="<?php echo e($image->path); ?>">
                            <button type="submit" class="btn btn-vermelho">deletar</button>
                        </form>
                    </div>

                <?php endif; ?>

            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<a class="btn btn-cinza text-white text-center" href="<?php echo e(route('imoveis.show')); ?>">Voltar</a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/coffcoff/Documents/Projects/agilizaimoveis.com/resources/views/admin/galeria/galeria.blade.php ENDPATH**/ ?>