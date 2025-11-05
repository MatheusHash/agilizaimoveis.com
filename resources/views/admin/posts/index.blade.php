{{-- directory layouts, archive app.blade.php --}}
@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <h2 class="p-5 text-red-600">Verifique se todos os campos foram preenchidos da maneira correta!</h2>
    @endif


    @if (session('success'))
        <div id="alert"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-[1278px]"
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

    <section class="bg-gray-700 flex justify-center rounded-[20px] shadow-lg min-h-screen shadow-white max-w-[1278px] ">

        <div>
            <div class=" py-12">
                <h1 class="text-[26px] text-center text-white border-b-2 border-white uppercase">Crie um novo POST na pagina
                    principal do site</h1>

                <form class="text-gray-600" method="post" enctype="multipart/form-data"
                    action="{{ route('posts.store') }}">
                    @csrf
                    <div class="flex flex-col items-center mt-6 ">
                        {{-- Titulo --}}
                        <div class="mb-4 w-full">
                            <label for="titulo" class=" text-[22px] text-gray-200">Título do Post</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"
                                    class=" @error('titulo') is-invalid @enderror placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Titulo do post">
                                @error('titulo')
                                    <h1 class="text-red-600 ">* Verifique este campo</h1>
                                @enderror
                            </div>
                        </div>


                        {{--                    content --}}
                        <div class="mb-4 w-full">
                            <label for="content" class="text-[20px] text-gray-300">Descrição</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <textarea name="content" rows="7" id="content"
                                    class="placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Paragrafos do POST">{{ old('content') }}</textarea>
                            </div>
                            @error('content')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>


                           {{-- LINK do botao --}}
                           <div class="mb-4 w-full">
                            <label for="linkPost" class=" text-[22px] text-gray-200">Link para o Botão</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="linkPost" id="linkPost" value="{{ old('linkPost') }}"
                                    class=" @error('linkPost') is-invalid @enderror placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="linkPost do post para o botao">
                                @error('linkPost')
                                    <h1 class="text-red-600 ">* Verifique este campo</h1>
                                @enderror
                            </div>
                        </div>

                        {{-- Image capture and show --}}
                        <div class="mb-4">
                            <p class="text-white">Pre-vizualizacao da imagem</p>
                            <figure class="w-[500px]">
                                <img id="previewImage" src="" alt="Imagem de pré-visualização"
                                    class="h-auto w-auto p-0 m-0 hidden  overflow-visible rounded-[20px]">
                            </figure>
                        </div>


                        <div class="mb-4">
                            <label for="imageInput" class="block text-gray-700 font-bold">Escolha uma imagem:</label>
                            <input type="file" id="imageInput" accept="image/*" name="image"
                                class="border rounded p-2">
                        </div>

                        {{-- Btn para submeter o formulario --}}
                        <div>
                            <button type="submit"
                                class="w-[400px] text-lg bg-blue-500 hover:bg-blue-700 text-white font-bold p-5 rounded-lg">Enviar</button>
                        </div>
                </form>


                <script>
                    // Captura o input de imagem e a imagem de pré-visualização
                    const imageInput = document.getElementById('imageInput');
                    const previewImage = document.getElementById('previewImage');

                    // Adiciona um evento de mudança ao input de imagem
                    imageInput.addEventListener('change', (event) => {
                        const file = event.target.files[0];

                        if (file) {
                            // Cria um objeto URL para a imagem selecionada
                            const imageURL = URL.createObjectURL(file);

                            // Exibe a imagem de pré-visualização
                            previewImage.src = imageURL;
                            previewImage.classList.remove('hidden');
                        } else {
                            // Limpa a imagem de pré-visualização se nenhum arquivo for selecionado
                            previewImage.src = '';
                            previewImage.classList.add('hidden');
                        }
                    });



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
            </div>
        </div>
    </section>
@endsection
