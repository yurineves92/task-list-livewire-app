<div class="max-w-md mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Criar Nova Tarefa</h1>

    <form wire:submit.prevent="saveTask">
        <div class="mb-4">
            <label for="description" class="block text-gray-600 font-medium">Descrição:</label>
            <input wire:model="form.description" type="text" placeholder="Digite a descrição para uma tarefa" id="description" class="form-input mt-1 block w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
            @error('form.description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between">
            <button type="submit" class="w-1/2 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 mr-3 rounded">
                Salvar
                <div wire:loading>
                    <svg class="animate-spin h-5 w-5 inline-block -ml-1 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.86 3.169 8.022l2-2.732zM12 20a8 8 0 01-8-8h-4c0 3.042 1.135 5.86 3.169 8.022l2-2.732zm2-2.732A7.962 7.962 0 0112 12h-4a7.963 7.963 0 012.831-6.068l2 2.732zm6.831-6.068A7.963 7.963 0 0120 12h4c0-6.627-5.373-12-12-12v4a7.963 7.963 0 016.831 2.732l-2 2.732z"></path>
                    </svg>
                </div>
            </button>

            <a wire:navigate href="{{ route('tasks.index') }}" class="w-1/2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded text-center">
                Voltar
            </a>
        </div>
    </form>
</div>
