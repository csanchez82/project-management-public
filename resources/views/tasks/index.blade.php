<x-app-layout>


    <style>

    </style>

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

                <div class="mt-6 flex flex-wrap gap-4">
                    @if (session('success'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                            class="flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div>
                                <span class="font-medium">{{ __('¡Éxito!') }}</span> {{ session('success') }}
                            </div>
                            <span x-on:click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-2 text-green-500 cursor-pointer hover:text-green-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </span>
                        </div>
                    @endif
                </div>

                <table id="search-table">
                    <thead>
                        <tr>
                            <th><span class="flex items-center">{{ __('Título') }}</span></th>
                            <th><span class="flex items-center">{{ __('Descripción') }}</span></th>
                            <th><span class="flex items-center">{{ __('Estado') }}</span></th>
                            <th><span class="flex items-center">{{ __('Fecha de Vencimiento') }}</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">{{ $task->title }}</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">{{ $task->description }}</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">{{ $task->status }}</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">{{ $task->due_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#search-table", {
            searchable: true,
            sortable: false
        });
    }
</script>
