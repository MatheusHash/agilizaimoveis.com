    <section class="w-full bg-indigo-50 ">

        <div class=" w-full  flex justify-center ">
            <form  action="<?php echo e(route("tags.store")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="flex">
                    <div class="p-2">
                        <h2 class="text-gray-900">Cadastrar Tag</h2>
                        <div class="mt-1 relative rounded-md shadow-sm">

                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Tag</label>
                            <input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ex.: Energia Solar">

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'bg-blue-900 hover:bg-blue-600 p-2 mt-4 ','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-blue-900 hover:bg-blue-600 p-2 mt-4 ','type' => 'submit']); ?>
                                <?php echo e(__('Cadastrar Tag')); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
<?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views/admin/tags/form.blade.php ENDPATH**/ ?>