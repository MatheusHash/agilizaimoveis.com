

<?php $__env->startSection('content'); ?>
    <div class="max-w-screen-xl  ">

        <?php if(count($mensagens) > 0): ?>
             <section class="w-full grid sm:grid-cols-2 lg:grid-cols-2 justify-items-center gap-4" id="mensagens">
            <?php $__currentLoopData = $mensagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mensagem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($mensagem->lida): ?>
                    <div class="bg-white border-solid border-2 rounded-[10px] pt-5 pl-5 pr-5 pb-0 border-green-500 max-w-md">
                        <div class="text-green-600">
                            <div class="flex justify-between">
                                <span class="font-bold"><?php echo e($mensagem->nome); ?></span>
                                <span><?php echo e(date('d-m-Y', strtotime($mensagem->created_at))); ?></span>
                            </div>
                            <div class="grid">
                                <span><?php echo e($mensagem->telefone); ?></span>
                                <hr>
                                <span><?php echo e($mensagem->email); ?></span>
                            </div>
                            <div>
                                <p class="text-black"><?php echo e($mensagem->mensagem); ?></p>
                            </div>

                            <div class="flex justify-end text-[18px] mt-4 gap-2">
                                <form class="ml-2" action="<?php echo e(route('contato.destroy',[$mensagem->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <input type="text" class="hidden" name="idMensagem" value="<?php echo e($mensagem->id); ?>">

                                    <button type="submit">
                                        <span class="material-symbols-outlined text-red-600">delete</span>
                                    </button>
                                </form>

                                <form action="<?php echo e(route('contato.update',[$mensagem->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="text" class="hidden" name="idMensagem" value="<?php echo e($mensagem->id); ?>">
                                    <button type="submit">
                                        <span class="material-symbols-outlined">
                                        mark_email_read
                                        </span>
                                    </button>

                                </form>
                            </div>

                        </div>
                    </div>
                     <?php else: ?>
                         <div class="bg-white border-solid border-2 rounded-[10px] pt-5 pl-5 pr-5 pb-0  border-blue-500 max-w-md">
                             <div class="text-blue-900">
                                 <div class="flex justify-between">
                                     <span class="font-bold"><?php echo e($mensagem->nome); ?></span>
                                     <span><?php echo e(date('d-m-Y', strtotime($mensagem->created_at))); ?></span>
                                 </div>
                                 <div class="grid">
                                     <span><?php echo e($mensagem->telefone); ?></span>
                                     <hr>
                                     <span><?php echo e($mensagem->email); ?></span>
                                 </div>

                                 <div>
                                     <p class="text-black"><?php echo e($mensagem->mensagem); ?></p>
                                 </div>

                                 <div class="flex justify-end text-[18px] mt-4">
                                     <form class="ml-2" action="<?php echo e(route('contato.destroy',[$mensagem->id])); ?>" method="post">
                                         <?php echo csrf_field(); ?>
                                         <?php echo method_field('DELETE'); ?>
                                         <input type="text" class="hidden" name="idMensagem" value="<?php echo e($mensagem->id); ?>">

                                         <button type="submit">
                                             <span class="material-symbols-outlined text-red-600">delete</span>
                                         </button>
                                     </form>

                                 </div>

                             </div>
                         </div>
                     <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </section>






































































        <?php else: ?>
            <div class="w-full bg-red-600 rounded-[10px] p-4">
                <span class="text-white text-lg">Não possui mensagens novas.</span>

            </div>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views//admin/dashboard.blade.php ENDPATH**/ ?>