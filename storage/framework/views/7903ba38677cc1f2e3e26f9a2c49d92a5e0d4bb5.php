<div class="form-group-buttons gap-1" style="display: flex">
    <button class="bg-gray-500 focus:bg-gray-300 focus:text-gray-700 border-solid border-spacing-1 font-semibold font-black w-1/2 h-16 rounded-t-lg  p-1" id="show-hide" onclick=MostrarOcultarForms(1) >Cadastrar Cidade</button>
    <button class="bg-gray-500 focus:bg-gray-300 focus:text-gray-700 border-solid border-spacing-1 font-semibold font-black w-1/2 h-16 rounded-t-lg  p-1" id="show-hide" onclick=MostrarOcultarForms(2) >Cadastrar Bairro</button>
</div>

    <section   class=" bg-indigo-50 flex justify-between  ">
        <div class="bg-gray-700 self-start w-1/2 rounded-r">
            <div class="text-center items-center left-0" style="display: none" id="formulario-cidade" >
                <form action="<?php echo e(route("municipios.store")); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="flex">
                        <div class="p-2" style="width: 60vw;">
                            <h2 class="text-blue-500 text-left ">Cadastrar Cidade</h2>
                            <div class="mt-1 relative rounded-md shadow-sm">

                                <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                                <input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ex.: São Sebastião do Paraíso ...">

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'p-2 mt-8 bg-blue-900 hover:bg-blue-600','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-2 mt-8 bg-blue-900 hover:bg-blue-600','type' => 'submit']); ?>
                                    <?php echo e(__('Cadastrar')); ?>
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
        </div>
    <div class="bg-gray-700 self-end w-1/2 rounded-l">
        <div class=" " style="display: none" id="formulario-bairro"  >
            <form action="<?php echo e(route("bairros.store")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="flex">
                    <div class="p-2" style="width: 60vw;">
                        <h2 class="text-blue-500 text-left  ">Novo Bairro</h2>
                        <div class="mt-1 relative rounded-md shadow-sm">

                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                            <input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ex.: Centro de Passos, Jardim Satélite ...">

                            <fieldset class="grid grid-cols-3 border-solid border-gray-400 mt-8">
                                <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <span class="text-white mr-2 mt-2">
                                        <input class="mr-2 " type="radio" name="municipio" value="<?php echo e($municipio->id); ?>"><?php echo e($municipio->nome); ?>
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </fieldset>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'p-2 mt-8 bg-blue-900 hover:bg-blue-600','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-2 mt-8 bg-blue-900 hover:bg-blue-600','type' => 'submit']); ?>
                                <?php echo e(__('Cadastrar')); ?>
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
    </div>
    </section>

    
        <script>
            function MostrarOcultarForms(tipo){
                let bairro = document.querySelector('#formulario-bairro');
                let cidade = document.querySelector('#formulario-cidade');

                if(tipo == 2){
                    cidade.style.display = 'none';
                    if(bairro.style.display === 'block'){
                        bairro.style.display = 'none';

                    }else{
                        bairro.style.display = 'block';

                    }
                }else{
                    bairro.style.display = 'none';
                    if(cidade.style.display === 'block'){
                        cidade.style.display = 'none';
                    }else{
                        cidade.style.display = 'block';

                    }
                }
            }
        </script>
    
<?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views/admin/localidades/form.blade.php ENDPATH**/ ?>