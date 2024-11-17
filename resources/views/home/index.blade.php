<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                    <!-- Total de Tareas -->
                    <div class="bg-purple-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Total de Tareas</h3>
                        <p class="text-2xl font-bold">{{ $totalTasks }}</p>
                    </div>

                    <!-- Tareas Bajas -->
                    <div class="bg-green-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Prioridad Baja</h3>
                        <p class="text-2xl font-bold">{{ $lowPriorityTasks }}</p>
                    </div>

                    <!-- Tareas Medias -->
                    <div class="bg-yellow-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Prioridad Media</h3>
                        <p class="text-2xl font-bold">{{ $mediumPriorityTasks }}</p>
                    </div>

                    <!-- Tareas Altas -->
                    <div class="bg-red-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Prioridad Alta</h3>
                        <p class="text-2xl font-bold">{{ $highPriorityTasks }}</p>
                    </div>

                    <!-- Tareas Completadas -->
                    <div class="bg-indigo-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Tareas Completadas</h3>
                        <p class="text-2xl font-bold">{{ $completedTasks }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>