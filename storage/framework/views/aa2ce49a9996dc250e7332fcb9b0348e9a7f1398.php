


<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <h2 class="p-5 text-red-600">Verifique se todos os campos foram preenchidos da maneira correta!</h2>
    <?php endif; ?>
    <section class="bg-gray-700 flex justify-center rounded-[20px] shadow-lg shadow-white ">

        <div>
            <div class=" py-12">
                <h1 class="text-[26px] text-center text-white border-b-2 border-white uppercase">Cadastrar imóvel</h1>

                <form class="text-gray-600" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="flex flex-col items-center mt-6 ">
                        
                        <div class="mb-4 w-1/2">
                            <label for="titulo" class=" text-[22px] text-gray-200">Título do imóvel</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="titulo" id="price" value="<?php echo e(old('titulo')); ?>"
                                    class=" <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Casa com Area de lazer">
                                <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <h1 class="text-red-600 ">* Verifique este campo</h1>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="mb-4 w-1/2">
                            <label for="corretor" class="text-[22px] text-gray-200">Nome</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="corretor" id="corretor"
                                    value="<?php echo e(old('corretor') ? old('corretor') : Auth::user()->name); ?>"
                                    class=" <?php $__errorArgs = ['corretor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Seu nome">
                                <?php $__errorArgs = ['corretor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="flex items-center flex-col w-1/2">
                            
                            <div class="mb-2 w-full">
                                <label for="valor" class="text-[22px] text-gray-200">Valor</label>
                                <input type="text" step="0.01" name="valor" id="price"
                                    value="<?php echo e(old('valor')); ?>"
                                    class="moneyMask placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="850000">
                                <?php $__errorArgs = ['valor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="flex self-end p-2 bg-gray-500 rounded-md">
                                <label class="cursor-pointer" for="ocultarValorParaCliente">
                                    <input class="placeholder-gray-400 cursor-pointer text-blue-700 h-[20px] w-[20px]"
                                        type="checkbox" name="ocultarValorParaCliente" id="ocultarValorParaCliente"
                                        value="1" <?php echo e(old('ocultarValorParaCliente') ? 'checked' : ''); ?>>
                                    <span class="text-gray-100 cursor-pointer">Ocultar valor para o cliente</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class=" mb-4 mt-6 p-6 bg-gray-400 rounded-[15px] w-2/4">
                            <div class="flex self-start p-2 bg-gray-500 rounded-md">
                                <label class="cursor-pointer h-7" for="lancamento">
                                    <input class="placeholder-gray-400 cursor-pointer text-blue-700 h-[20px] w-[20px]"
                                        type="checkbox" name="lancamento" id="lancamento" value="1"
                                        <?php echo e(old('lancamento') ? 'checked' : ''); ?>>
                                    <span class="text-gray-100 cursor-pointer">Marcar como lançamento</span>
                                </label>
                            </div>
                        </div>
                    </div>



                    <hr>

                    <div>
                        <span class="text-[20px] text-gray-300 mt-6">Escolha as imagens</span>

                        
                        <div class="mb-4 mt-6 p-6 bg-gray-400 rounded-[15px] w-2/4">
                            <label for="imagem-principal" class="text-[20px] text-gray-700">Foto principal - Foto de
                                Capa</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="file" accept="image/*" name="imagem-principal" id="imagem-principal"
                                    value="<?php echo e(old('imagem-principal')); ?>"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <?php $__errorArgs = ['imagem-principal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="mb-4 mt-6 p-6 bg-gray-400 rounded-[15px] w-2/4">
                        <label for="imagens" class="text-[20px] text-gray-700">Escolha as melhores imagens do
                            Imovel</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="file" accept="image/*" name="imagens[]" id="imagens"
                                value="<?php echo e(old('imagens')); ?>"
                                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                multiple>
                        </div>
                    </div>
                    <br>
                    <hr>


                    
                    <div class="mb-4 w-1/2">
                        <label for="endereco" class="text-[20px] text-gray-300">Endereço</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="endereco" id="endereco" value="<?php echo e(old('endereco')); ?>"
                                class="placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                placeholder="Avenida Sabia, 1024">
                            <?php $__errorArgs = ['endereco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>


                    
                    <div class="mb-4 w-1/2">
                        <label for="descricao" class="text-[20px] text-gray-300">Descrição</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="descricao" rows="7" id="descricao"
                                class="placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                placeholder="Breve Descrição sobre o ímovel..."><?php echo e(old('descricao')); ?></textarea>
                        </div>
                        <?php $__errorArgs = ['descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="mb-4 w-3/4">
                        <label for="googlemaps" class="text-[20px] text-gray-300">Cole aqui o link do Google Maps</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="googlemaps" id="googlemaps"
                                class=" placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                placeholder="link"><?php echo e(old('googlemaps')); ?></textarea>
                        </div>
                        <?php $__errorArgs = ['googlemaps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="mt-6 container ">

                        <h3 class="text-gray-300 text-[24px] text-center pt-8 pb-3"> Cômodos / Áreas do imóvel</h3>

                        <div class="w-full ">
                            <div class="flex">
                                <div class="mr-2">
                                    <label for="quarto" class="text-gray-300 text-[18px]">Quartos</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="quarto" id="quarto" value="<?php echo e(old('quarto')); ?>"
                                            class="placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <?php $__errorArgs = ['quarto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mr-2">
                                    <label for="banheiro" class="text-gray-300 text-[18px]">Banheiros</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="banheiro" id="banheiro"
                                            value="<?php echo e(old('banheiro')); ?>"
                                            class="placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <?php $__errorArgs = ['banheiro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mr-2">
                                    <label for="suite" class="text-gray-300 text-[18px]">Suíte</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="suite" id="suite" value="<?php echo e(old('suite')); ?>"
                                            class="placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <?php $__errorArgs = ['suite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mr-2">
                                    <label for="garagem" class="text-gray-300 text-[18px]">Vagas - Garagem</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="garagem" id="garagem"
                                            value="<?php echo e(old('garagem')); ?>"
                                            class="placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <?php $__errorArgs = ['garagem'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="mt-6 py-4 mb-4">
                        <div class="w-6/12 grid">
                            <label for="motivo" class="text-[20px] text-gray-300">O imóvel esta para</label>

                            <select name="motivo" id="motivo" class="rounded-lg" onselect="">
                                <option value="1">Alugar</option>
                                <option value="2">Vender</option>
                            </select>
                        </div>
                        <?php $__errorArgs = ['motivo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    
                    <div class="mt-12 grid grid-cols-3 bg-gray-400 rounded-[20px] p-4">

                        <div class="w-4/6 flex flex-col">

                            <label for="municipio" class="text-[20px] text-gray-700">Município</label>
                            <select name="municipio" class="rounded-lg">
                                <option disabled selected>Cidades</option>
                                <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option name="municipioOption" value="<?php echo e($municipio->id); ?>"><?php echo e($municipio->nome); ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['cidade_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="w-4/6  flex flex-col">

                            <label for="bairro" class="text-[20px] text-gray-700">Bairro</label>
                            <select name="bairro" class="rounded-lg">
                                <option name="bairroOption" value=""></option>
                            </select>
                        </div>


                        <div class="w-3/6 flex flex-col">
                            <label class="text-[20px] text-gray-700">Categoria</label>
                            <select name="categoria_id" id="categoria_id" class="rounded-lg">
                                <?php $__currentLoopData = $Categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nome); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                    </div>

                    
                    <div class="mt-16">

                        <label class="mt-16 text-[20px] text-gray-300">Tags</label>
                        <fieldset class="rounded-[20px] bg-gray-200 grid grid-cols-4" name="tag_id" id="tag_id"
                            multiple="multiple">
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="text-gray-700 m-2">
                                    <input class="placeholder-gray-400 mr-2" type="checkbox" name="tags-op[]"
                                        value="<?php echo e($tag->id); ?>"><?php echo e($tag->nome); ?>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </fieldset>
                        <?php $__errorArgs = ['tag_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="flex flex-col items-center mt-12">
                        <label class="text-[20px] text-gray-300 w-6/12" for="visibility">Escolha a visibilidade do
                            imóvel</label><br>
                        <select name="visibility" id="visibility" class="rounded-lg w-6/12">
                            <option value="1">Visível</option>
                            <option value="0">Oculto</option>
                        </select>
                        <?php $__errorArgs = ['visibility'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    
                    <div class="flex justify-center">
                        <button
                            class="w-8/12 mt-14 bg-gray-800 text-lg rounded-lg btn-azul text-white text-center font-bold p-5"
                            type="submit">Cadastrar Imóvel</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    
    <script type="text/javascript" src="<?php echo e(asset('/js/archives/jquery.mask.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.moneyMask').mask('#.##0,00', {
                reverse: true
            })
        })

        $('select[name=municipio]').change(function() {

            // $("#bairros").html('Bairros {}')
            let idCidade = $(this).val();
            $.ajax({
                url: `/api/municipios/${idCidade}/bairros`,
                success: function(bairros) {
                    $('select[name=bairro]').empty();
                    if (bairros.length > 0) {

                        $.each(bairros, function(key, value) {
                            // console.log(value)
                            if (value) {
                                $('select[name=bairro]').append(
                                    `<option value="${value.id}">${value.nome}</option>`);
                            }
                        });
                    } else {
                        $('select[name=bairro]').append(
                            `<option disabled selected>Nenhum bairro desta cidade cadastrado</option>`
                        );
                    }

                },
                error: function() {
                    $("#bairros").html("Error ao carregar bairros!!");
                },
            });

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views/admin/imoveis/imovel.blade.php ENDPATH**/ ?>