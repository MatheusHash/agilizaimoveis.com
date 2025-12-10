<section class="bg-white">
    <div class="max-w-4xl mx-auto p-6">

        <form action="{{ route('admin.homepage.empreendimento.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white border border-gray-200 rounded-xl p-6 space-y-4">

            @csrf

            <h3 class="text-xl font-semibold text-orange-600 uppercase">Cadastrar Empreendimento</h3>

            <!-- Upload -->
            <div>
                <label class="font-medium text-gray-700 block mb-1">Imagem de capa:</label>
                <input id="imagem-input" type="file" name="imagem" accept="image/*" required class="block w-full text-gray-700 border rounded-md cursor-pointer 
                   file:bg-[#f95c02] file:text-white file:border-none 
                   file:px-4 file:py-2 file:rounded-md file:cursor-pointer">
            </div>

            <!-- Preview -->
            <div class="border border-dashed border-gray-400 rounded-lg p-3 text-center">
                <p class="text-gray-600 text-sm">Pré-visualização:</p>
                <img id="preview-img" class="w-full max-h-64 object-cover rounded-lg hidden mt-3">
            </div>

            <!-- Título -->
            <div>
                <label class="font-medium text-gray-700 block mb-1">Título:</label>
                <input type="text" name="titulo" required placeholder="Nome do empreendimento"
                    class="w-full border rounded-md p-2 text-gray-700 focus:ring-[#f95c02] focus:outline-none">
            </div>

            <!-- Descrição -->
            <div>
                <label class="font-medium text-gray-700 block mb-1">Descrição:</label>
                <textarea name="descricao" rows="4" required placeholder="Descrição do empreendimento"
                    class="w-full border rounded-md p-2 text-gray-700 focus:ring-[#f95c02] focus:outline-none"></textarea>
            </div>

            <button type="submit"
                class="bg-[#f95c02] hover:bg-[#db5201] text-white font-medium rounded-md px-5 py-2 transition">
                Salvar
            </button>
        </form>

        <!-- Listagem -->
        <h3 class="text-xl font-semibold text-orange-600 uppercase mb-3">Empreendimentos cadastrados</h3>
        <div id="lista-empreendimentos" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($empreendimentos as $emp)
                <div
                    class="bg-white shadow-sm border border-gray-200 rounded-lg p-3 hover:shadow-md transition relative group">

                    <!-- Botão excluir -->
                    <form action="{{ route('admin.homepage.empreendimento.destroy', ['id' => $emp->id]) }}" method="POST"
                        class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Excluir este empreendimento?')"
                            class="bg-red-500 text-white text-xs px-2 py-1 rounded-md hover:bg-red-600">
                            Excluir
                        </button>
                    </form>

                    <img src="{{ asset($emp->imagem_capa_path)}}" class="w-full h-36 object-cover rounded-md">
                    <h4 class="text-lg font-semibold mt-2">{{ $emp->titulo }}</h4>
                    <p class="text-gray-600 text-sm mt-1">{{ $emp->descricao }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    document.getElementById("imagem-input")?.addEventListener("change", function () {
        const img = document.getElementById("preview-img");
        img.src = URL.createObjectURL(this.files[0]);
        img.classList.remove("hidden");
    });
</script>