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

                <table id="search-table">
                    <thead>
                        <tr>
                            <th><span class="flex items-center">{{ __('ID') }}</span></th>
                            <th><span class="flex items-center">{{ __('Usuario') }}</span></th>
                            <th><span class="flex items-center">{{ __('Título') }}</span></th>
                            <th><span class="flex items-center">{{ __('Descripción') }}</span></th>
                            <th><span class="flex items-center">{{ __('Estado') }}</span></th>
                            <th><span class="flex items-center">{{ __('Fecha de Vencimiento') }}</span></th>
                            <th><span class="flex items-center">{{ __('Creado el') }}</span></th>
                            <th><span class="flex items-center">{{ __('Actualizado el') }}</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">TASK-001</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">1</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">Revisar Código</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">Revisión de código
                                fuente para errores y optimización.</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">media</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-12-01</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-11-10 14:30:00
                            </td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-11-12 09:00:00
                            </td>
                        </tr>
                        <tr>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">TASK-002</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">Reunión de Equipo
                            </td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">Reunión para
                                discutir
                                el progreso del proyecto.</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">alta</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-11-25</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-11-11 10:00:00
                            </td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-11-11 10:00:00
                            </td>
                        </tr>
                        <tr>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">TASK-003</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">3</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">Actualizar
                                Documentos
                            </td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">Actualización de la
                                documentación del proyecto.</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">baja</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-12-15</td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-11-12 16:45:00
                            </td>
                            <td class="font-medium text-black whitespace-nowrap dark:text-white">2024-11-12 16:45:00
                            </td>
                        </tr>
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
