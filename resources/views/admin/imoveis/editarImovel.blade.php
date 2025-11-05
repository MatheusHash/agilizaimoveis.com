{{-- directory layouts, archive app.blade.php --}}
@extends('layouts.admin')

@section('content')
    @if (session('mensagem'))
        <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert">
            <strong class="font-bold">Sucesso!</strong>
            <span class="block sm:inline">Sua ação foi concluída com êxito.</span>
            <span id="close" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeAlert()">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Fechar</title>
                    <path
                        d="M14.348 5.652a1 1 0 011.414 1.414L7.414 12l8.348 8.348a1 1 0 11-1.414 1.414L6 13.414l-8.348 8.348a1 1 0 11-1.414-1.414L4.586 12 .93 3.652A1 1 0 112.344 2.238L6 6.586 14.348 14.93a1 1 0 11-1.414 1.414L4.586 8 .93 16.348a1 1 0 11-1.414-1.414L6 5.414 14.348.93a1 1 0 111.414 1.414L7.414 12l8.348 8.348a1 1 0 01-1.414 1.414L6 13.414l-8.348 8.348a1 1 0 01-1.414-1.414L4.586 12 .93 3.652A1 1 0 112.344 2.238L6 6.586 14.348 14.93a1 1 0 11-1.414 1.414L4.586 8 .93 16.348a1 1 0 11-1.414-1.414L6 5.414 14.348.93a1 1 0 111.414 1.414L7.414 12l8.348 8.348a1 1 0 11-1.414 1.414L6 13.414l-8.348 8.348a1 1 0 01-1.414-1.414L4.586 12 .93 3.652A1 1 0 112.344 2.238L6 6.586 14.348 14.93a1 1 0 11-1.414 1.414L4.586 8 .93 16.348a1 1 0 11-1.414-1.414L6 5.414 14.348.93a1 1 0 111.414 1.414L7.414 12l8.348 8.348a1 1 0 11-1.414 1.414L6 13.414l-8.348 8.348a1 1 0 01-1.414-1.414L4.586 12 .93 3.652A1 1 0 112.344 2.238L6 6.586 14.348 14.93a1 1 0 11-1.414 1.414L4.586 8 .93 16.348a1 1 0 11-1.414-1.414L6 5.414 14.348 .93a1 1 0 111.414 1.414L7.414 12l8.348 8.348a1 1 0 11-1.414 1.414L6 13.414l-8.348 8.348a1 1 0 01-1.414-1.414L4.586 12 .93 3.652A1 1 0 112.344 2.238L6 6.586 14.348 14.93a1 1 0 11-1.414 1.414L4.586 8 .93 16.348a1 1 0 11-1.414-1.414L6 5.414 14.348.93a1 1 0 111.414 1.414L7.414 12l8.348 8.348a1 1 0 11-1.414 1.414L6 13.414l-8.348 8.348a1 1 0 01-1.414-1.414L4.586 12 .93 3.652A1 1 0 112.344 2.238L6 6.586 14.348 14.93a1 1 0 11-1.414 1.414L4.586 8 .93 16.348a1 1 0 11-1.414-1.414L6 5.414 14.348.93a1 1 0 111.414 1.414L7.414 12l8.348 8.348a1 1 0 11-1.414 1.414L6 13.414l-8.348 8.348a1 1 0 01-1.414-1.414L4.586 12 .93 3.652A1 1 0 112.344 2.238L6 6.586 14.348 14.93a1 1 0 11-1.414 1.414L4.586 8 .93 16.348a1 1 0 11-1.414-1.414L6 5.414 14.348.93a1 1 0 111.414 1.414z" />
                </svg>
            </span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erro!</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="bg-slate-200 justify-center grid gap-[50px] rounded-lg">

        <div class="grid grid-cols-1">

            <div class="w-auto py-12 ">
                <div class="grid grid-cols-1">

                    @if ($imovel->fotoPrincipal)
                        <div class="w-4/12 self-center">
                            <img class="max-h-64 h-64 rounded-[8px]" src="{{ asset($imovel->fotoPrincipal->path) }}" />
                        </div>
                    @endif

                    <h1 class="text-center text-gray-600">Editar imóvel: #{{ $imovel->id }}</h1>
                </div>

                <form class="text-gray-600 grid gap-[50px]" method="post"
                    action=" {{ route('imoveis.update', $imovel->id) }} ">
                    @method('put')
                    @csrf
                    {{-- Titulo --}}
                    <div>
                        <label for="titulo" class="text-[28px] font-semibold text-gray-700">Titulo</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="titulo" id="price" value="{{ $imovel->titulo }}"
                                class="@error('titulo') is-invalid @enderror w-full px-4 py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                            @error('titulo')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>

                    {{-- Corretor --}}
                    <div>
                        <label for="corretor" class="text-[28px] font-semibold text-gray-700">Nome</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="corretor" id="corretor" value="{{ $imovel->corretor }}"
                                class="@error('corretor') is-invalid @enderror w-full px-4 py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                            @error('corretor')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>

                    <div class="grid place-items-end mb-[40px]">

                        {{-- Valor --}}
                        <div class=" w-full mb-4">
                            {{-- @dump($imovel->valor) --}}
                            <label for="valor" class="text-[28px] font-semibold text-gray-700">Valor</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input type="text" name="valor" id="price" value="{{ $imovel->valor ? $imovel->valor *100 : '' }}"
                                    class="moneyMask w-full px-4 py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                                @error('valor')
                                    <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                @enderror
                            </div>
                        </div>

                        {{-- Valor visivel para os clientes - field[ocultarValorParaCliente] --}}
                        <div class="right-0 p-2 w-[350px] bg-slate-400 rounded-md">
                            <label class="cursor-pointer" for="ocultarValorParaCliente">
                                <input class="cursor-pointer text-blue-700 h-[20px] w-[20px]" type="checkbox"
                                    name="ocultarValorParaCliente" id="ocultarValorParaCliente" value="1"
                                    {{ $imovel->ocultarValorParaCliente == 1 ? 'checked' : '' }}>
                                <span class="text-gray-800 text-lg cursor-pointer">Ocultar valor para o cliente</span>
                            </label>
                        </div>

                        <div class="bg-gray-400  rounded-[15px] mt-5">

                            {{-- Colocar imovel para a pagina de lancamentos - field[lancamento] --}}
                            <div class=" mb-4 mt-6 p-6  ">
                                <div class="flex self-start p-2 bg-gray-500 rounded-md">
                                    <label class="cursor-pointer h-7" for="lancamento">
                                        <input class="placeholder-gray-400 cursor-pointer text-blue-700 h-[20px] w-[20px]"
                                            type="checkbox" name="lancamento" id="lancamento" value="1"
                                            {{ $imovel->lancamento == 1 ? 'checked' : '' }}>
                                        <span class="text-gray-100 cursor-pointer">Marcar como lançamento</span>
                                    </label>
                                </div>
                            </div>

                            {{-- Colocar imovel como uma Oportunidade - field[oportunidade] --}}
                            <div class=" mb-4 mt-6 p-6  ">
                                <div class="flex self-start p-2 bg-gray-500 rounded-md">
                                    <label class="cursor-pointer h-7" for="oportunidade">
                                        <input class="placeholder-gray-400 cursor-pointer text-blue-700 h-[20px] w-[20px]"
                                            type="checkbox" name="oportunidade" id="oportunidade" value="1"
                                            {{ $imovel->oportunidade == 1 ? 'checked' : '' }}>
                                        <span class="text-gray-100 cursor-pointer">Destacar como OPORTUNIDADE</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Endereco --}}
                    <div>
                        <label for="endereco" class="text-[28px] font-semibold text-gray-700">Endereço</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="endereco" id="endereco" value="{{ $imovel->endereco }}"
                                class="w-full px-4 py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                            @error('endereco')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>


                    {{--                    Descricao --}}
                    <div>
                        <label for="descricao" class="text-[28px] font-semibold text-gray-700">Descrição</label>
                        <div class="mt-1  rounded-md shadow-sm">
                            <textarea name="descricao" id="descricao" rows="6"
                                class="w-full py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                            {{ $imovel->descricao }}
                        </textarea>
                        </div>
                        @error('descricao')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>


                    {{--                    Link do Google maps --}}
                    <div>
                        <label for="googlemaps" class="text-[28px] font-semibold text-gray-700">Cole aqui o link do
                            Google
                            Maps</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="googlemaps" id="googlemaps" rows="6"
                                class="w-full py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                                {{ $imovel->googlemaps }}</textarea>
                        </div>

                    </div>

                    {{--                    Comodos e areas do imovel --}}
                    <div class=" container grid gap-[30px] text-center">

                        {{-- <h3 class="text-gray-600 text-center pt-8 pb-3" style="font-size: 2em;"> Comodos / Áreas do
                            imovel
                        </h3> --}}
                        <h2 class="text-[28px] font-semibold text-gray-700">Detalhes do Imóvel</h2>
                        <div class="w-full ">
                            <div class="flex justify-evenly">
                                <div>
                                    <label for="quarto" class="block font-medium text-gray-700 mb-1">Quartos</label>
                                    <input
                                        class="px-4 py-2 rounded-md w-[150px] border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400"
                                        type="number" name="quarto" id="quarto" value="{{ $imovel->quarto }}">
                                    @error('quarto')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>


                                <div>
                                    <label for="banheiro" class="block font-medium text-gray-700 mb-1">Banheiros</label>
                                    <div class="mt-1  rounded-md shadow-sm">
                                        <input
                                            class="px-4 py-2 rounded-md w-[150px] border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400"
                                            type="number" name="banheiro" id="banheiro"
                                            value="{{ $imovel->banheiro }}">
                                    </div>
                                    @error('banheiro')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div>
                                    <label for="suite" class="block font-medium text-gray-700 mb-1">Suíte</label>
                                    <div class="mt-1  rounded-md shadow-sm">
                                        <input
                                            class="px-4 py-2 rounded-md w-[150px] border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400"
                                            type="number" name="suite" id="suite" value="{{ $imovel->suite }}">
                                    </div>
                                    @error('suite')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div>
                                    <label for="garagem" class="block font-medium text-gray-700 mb-1">Vagas -
                                        Garagem</label>
                                    <div class="mt-1  rounded-md shadow-sm">
                                        <input
                                            class="px-4 py-2 rounded-md w-[150px] border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400"
                                            type="number" name="garagem" id="garagem"
                                            value="{{ $imovel->garagem }}">
                                    </div>
                                    @error('garagem')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <p>O imóvel está para</p>
                            <select name="motivo" id="motivo"
                                class="px-4 py-2 rounded-md w-[150px] border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400"
                                onselect="">
                                <option value="1" {{ 1 == $imovel->motivo ? 'selected' : '' }}>Alugar</option>
                                <option value="2" {{ 2 == $imovel->motivo ? 'selected' : '' }}>Vender</option>
                                {{-- <option value="3" {{ 3 == $imovel->motivo ? 'selected' : '' }}>Alugar ou Vender</option> --}}
                            </select>
                        </div>
                        @error('motivo')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>


                    {{-- Municipios e Bairros --}}
                    <div class="flex justify-between">

                        <div>
                            <p>Municipios</p>
                            <select name="municipio_id"
                                class="px-4 py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                                <option disabled selected>Cidades</option>
                                @foreach ($municipios as $key => $municipio)
                                    <option name="municipioOption" value="{{ $municipio->id }}"
                                        {{ $municipio->id == $imovel->municipio_id ? 'selected' : '' }}>
                                        {{ $municipio->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('municipio_id')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>

                        <div>
                            <p>Bairros</p>
                            <select name="bairro_id"
                                class="px-4 py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                                <option disabled selected>Nenhum bairro desta cidade cadastrado</option>
                                @foreach ($imovel->municipio->bairros as $key => $bairro)
                                    <option name="bairroOption" value="{{ $bairro->id }}"
                                        {{ $bairro->id == $imovel->bairro_id ? 'selected' : '' }}>
                                        {{ $bairro->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div>

                        <p>Categoria</p>
                        <select name="categoria_id" id="categoria_id"
                            class="px-4 py-2 rounded-md  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                            @foreach ($Categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ $categoria->id == $imovel->categoria_id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>
            </div>

            <div class=" flex justify-between">

                <div>
                    <p class="text-gray-600">Escolha a visibilidade do imóvel</p>
                    <select name="visibility" id="visibility"
                        class="px-4 py-2 rounded-md w-[150px]  border border-gray-300 focus:blue focus:to-blue-400 focus:border-blue-400">
                        <option value="1">Visivel</option>
                        <option value="0">Oculto</option>
                    </select>
                    @error('visibility')
                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                    @enderror
                </div>
            </div>

            {{-- Tags --}}
            <div class="mt-16">

                <h2 class="text-[28px] font-semibold text-gray-700">Tags</h2>

                <fieldset class="rounded-[20px] bg-gray-200 grid grid-cols-4" name="tag_id" id="tag_id"
                    multiple="multiple">
                    @foreach ($tags as $tag)
                        <span class="text-gray-700 m-2">
                            <input class="mr-2" type="checkbox" name="tags_op[]" value="{{ $tag->id }}"
                                @if ($imovel->tags->contains($tag->id)) checked @endif>{{ $tag->nome }}
                        </span>
                    @endforeach
                </fieldset>
                @error('tag_id')
                    <h1 class="text-red-600 ">* Campo obrigatório</h1>
                @enderror
            </div>

            {{-- Btn para submeter o formulario --}}
            <button class="w-full text-lg  bg-gray-800 rounded-lg btn-azul text-white text-center font-bold p-5 mt-6"
                type="submit">Atualizar</button>
            <a href="{{ url()->previous() }}"
                class="w-full bg-gray-800 text-lg rounded-lg btn-cinza text-white text-center font-bold p-5 mt-6">Cancelar</a>

            </form>
        </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('/js/archives/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.moneyMask').mask('#.##0,00', {
                reverse: true
            })
        })
        $('select[name=municipio_id]').change(function() {

            // $("#bairros").html('Bairros {}')
            var idCidade = $(this).val();
            $.ajax({
                url: `/api/municipios/${idCidade}/bairros`,
                success: function(bairros) {
                    $('select[name=bairro_id]').empty();
                    if (bairros.length > 0) {

                        $.each(bairros, function(key, value) {
                            if (value) {
                                $('select[name=bairro_id]').append(
                                    `<option value="${value.id}">${value.nome}</option>`);
                            }
                        });
                    } else {
                        $('select[name=bairro_id]').append(
                            `<option disabled selected>Nenhum bairro desta cidade cadastrado</option>`
                        );
                    }

                },
                error: function() {
                    $("#bairros").html("Error ao carregar bairros!!");
                },
            });

        })


        function closeAlert() {
            const alertDiv = document.getElementById('alert'); // Seletor da div do alerta
            if (alertDiv) {
                alertDiv.remove(); // Remove a div do DOM
            }
        }
        setTimeout(() => {
            closeAlert()
        }, 7000);
    </script>
@endsection
