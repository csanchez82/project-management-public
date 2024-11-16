<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-blue-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Total de Tareas</h3>
                        <p class="text-2xl font-bold">10</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-red-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Tareas Pendientes</h3>
                        <p class="text-2xl font-bold">5</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-yellow-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Tareas Próximas a Vencer</h3>
                        <p class="text-2xl font-bold">3</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-green-500 text-white rounded-lg p-4">
                        <h3 class="text-lg font-bold">Tareas Completadas</h3>
                        <p class="text-2xl font-bold">7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
