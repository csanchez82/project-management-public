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
                            <td class="flex space-x-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4z"/>
                                    </svg>
                                </a>
                                @if (!$task->completed)
                                    <form id="complete-form-{{ $task->id }}" action="{{ route('tasks.complete', $task->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="button" class="text-green-600 hover:text-green-900" onclick="confirmCompletion('{{ $task->id }}')" title="Completar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20 6 9 17l-5-5"/>
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400" title="Tarea completada">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 6 9 17l-5-5"/>
                                        </svg>
                                    </span>
                                @endif
                                @php
    $isDemo = config('app.demo_mode');
@endphp

<button 
    type="button" 
    class="text-red-600 hover:text-red-900 {{ $isDemo ? 'cursor-not-allowed opacity-50' : '' }}" 
    onclick="{{ !$isDemo ? "confirmDeletion('$task->id')" : '' }}" 
    title="Eliminar" 
    {{ $isDemo ? 'disabled' : '' }}
>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 6h18"/>
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
        <line x1="10" x2="10" y1="11" y2="17"/>
        <line x1="14" x2="14" y1="11" y2="17"/>
    </svg>
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

    function confirmCompletion(taskId) {
        Swal.fire({
            title: '¿Completar tarea?',
            text: "Esta acción marcará la tarea como completada.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#26a269',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, completar!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('complete-form-' + taskId).submit();
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