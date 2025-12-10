<div class=" bg-white p-10">
    <h1 class="text-3xl font-bold mb-6 text-orange-600 uppercase text-center">Gerenciar Imagens da Homepage</h1>
    <div class="max-w-4xl mx-auto p-6">
        <form id="uploadForm" action="{{ route('admin.homepage.slider.store') }}" method="POST"
            enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-xl p-6 space-y-4">

            @csrf

            <h3 class="text-xl font-semibold text-gray-800">Enviar Slide</h3>

            <!-- Upload -->
            <div>
                <label class="font-medium text-gray-700 block mb-1">Selecionar imagem:</label>
                <input type="file" name="image" id="image" accept="image/*" required class="block w-full text-gray-700 border rounded-md cursor-pointer 
                       file:bg-[#f95c02] file:text-white file:border-none 
                       file:px-4 file:py-2 file:rounded-md file:cursor-pointer" onchange="previewImage(event)">
            </div>

            <!-- Preview -->
            <div id="imagePreviewContainer"
                class="border border-dashed border-gray-400 rounded-lg p-3 text-center hidden">

                <p class="text-gray-600 text-sm">Pré-visualização:</p>

                <img id="imagePreview" class="w-full max-h-64 object-cover rounded-lg mt-2 shadow-sm">
            </div>

            <button type="submit"
                class="bg-[#f95c02] hover:bg-[#db5201] text-white font-medium rounded-md px-5 py-2 transition">
                Enviar Imagem
            </button>

        </form>
    </div>

    <div id="imageGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($images as $image)
            <div data-id="{{ $image->id }}"
                class="image-item relative group border rounded overflow-hidden shadow hover:shadow-lg transition cursor-move">
                <img src="{{ asset($image->path) }}" class="w-full h-48 object-cover" alt="Imagem da homepage">
                <button onclick="deleteImage({{ $image->id }})"
                    class="absolute top-2 right-2 hidden group-hover:block bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded shadow">
                    Excluir
                </button>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-10 border border-dashed rounded-lg">
                <p class="text-lg font-medium">Nenhuma imagem adicionada ainda.</p>
                <p class="text-sm text-gray-400">Envie uma imagem para começar.</p>
            </div>
        @endforelse
    </div>

</div>

{{-- Scripts --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const previewContainer = document.getElementById('imagePreviewContainer');
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            previewContainer.classList.add('hidden');
        }
    }

    document.getElementById('uploadForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const form = e.target;
        console.log(form.method + ' - ' + form.action);
        const formData = new FormData(form);
        console.log(formData);
        // const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch(form.action, {
            // headers: {
            //     'X-CSRF-TOKEN': token
            // },
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        console.log(data);
        if (data.success) {
            form.reset();
            document.getElementById('imagePreviewContainer').classList.add('hidden');
            document.location.reload()
        }
    });

    async function deleteImage(id) {
        if (!confirm('Tem certeza que deseja excluir esta imagem?')) return;
        console.log('excluir: ', id)
        const response = await fetch(`/admin/homepage-slider/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });
        const data = await response.json();
        console.log(response)
        if (data.success) {
            document.querySelector(`[data-id="${id}"]`).remove();
        }
    }

    // Drag & drop reorder
    let dragSrc = null;
    document.addEventListener('dragstart', e => {
        if (e.target.classList.contains('image-item')) {
            dragSrc = e.target;
            e.dataTransfer.effectAllowed = 'move';
        }
    });
    document.addEventListener('dragover', e => {
        if (e.target.classList.contains('image-item')) e.preventDefault();
    });
    document.addEventListener('drop', async e => {
        if (e.target.classList.contains('image-item') && dragSrc !== e.target) {
            e.preventDefault();
            const grid = document.getElementById('imageGrid');
            const items = Array.from(grid.children);
            const draggedIndex = items.indexOf(dragSrc);
            const targetIndex = items.indexOf(e.target);
            if (draggedIndex > targetIndex) {
                grid.insertBefore(dragSrc, e.target);
            } else {
                grid.insertBefore(dragSrc, e.target.nextSibling);
            }
            const order = Array.from(grid.children).map(el => el.dataset.id);
            // await fetch('', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     body: JSON.stringify({ order })
            // });
        }
    });
</script>