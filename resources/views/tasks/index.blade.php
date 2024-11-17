<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <x-call-forms href="{{ route('tasks.create') }}">
                    {{ __('Agregar Tarea') }}
                </x-call-forms>

                <!-- Success Message -->
                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                         class="flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                        <div>
                            <span class="font-medium">{{ __('¡Éxito!') }}</span> {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Tasks Table -->
                <table id="search-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                    <tr>
                        <th>{{ __('Título') }}</th>
                        <th>{{ __('Descripción') }}</th>
                        <th>{{ __('Estado') }}</th>
                        <th>{{ __('Fecha de Vencimiento') }}</th>
                        <th>{{ __('Acción') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Editar
                                </a>
                                <button type="button" class="text-red-600 hover:text-red-900" onclick="confirmDeletion('{{ $task->id }}')">
                                    Eliminar
                                </button>
                                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeletion(taskId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + taskId).submit();
            }
        });
    }

    if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#search-table", {
            searchable: true,
            sortable: false
        });
    }
</script>
