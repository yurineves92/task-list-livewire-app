<div>
    <div class="py-6">
        <h1 class="text-2xl font-semibold mb-4">Lista de Tarefas</h1>

        <div class="flex flex-col md:flex-row justify-between mb-4">
            <div class="space-y-2 md:space-y-0 md:flex md:space-x-4">
                <div class="flex flex-col">
                    <label for="search" class="text-sm">Descrição</label>
                    <input type="search" id="search" wire:model.live="search" placeholder="Pesquise..." class="w-64 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="complete" class="text-sm">Está finalizado?</label>
                    <select id="complete" wire:model.live="complete" class="w-36 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                        <option value="">Todos</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="start_date" class="text-sm">Data de Início</label>
                    <input type="date" id="start_date" wire:model.live="startDate" class="w-40 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="end_date" class="text-sm">Data de Fim</label>
                    <input type="date" id="end_date" wire:model.live="endDate" class="w-40 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                </div>
            </div>
            <div class="ml-auto mt-8">
                <a wire:navigate href="{{ route('tasks.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">
                    Adicionar
                </a>
            </div>
        </div>
        <div class="text-black-600" wire:loading>Carregando...</div>
        @if ($tasks->count())
            <table class="min-w-full bg-white border divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Criado em</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Concluída em</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $this->formatDate($task->created_at) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($task->completed_at)
                                {{ $this->formatDate($task->completed_at) }}
                            @else
                                <button wire:click="completeTask({{ $task->id }})" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-700">Completar</button>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if (!$task->completed_at)
                                <div class="space-x-2">
                                    <a wire:navigate href="{{ route('tasks.update', $task->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-full focus:outline-none focus:shadow-outline-green active:bg-green-700">Editar</a>
                                    <button wire:click="deleteTask({{ $task->id }})" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-full focus:outline-none focus:shadow-outline-red active:bg-red-700">Excluir</button>
                                </div>
                            @else
                                <div class="text-green-500">Tarefa completada</div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                {{ $tasks->links() }}
                </tfoot>
            </table>
        @else
            <div class="text-black-600" wire:loading.remove>Nenhum registro encontrado.</div>
        @endif

    </div>
</div>
