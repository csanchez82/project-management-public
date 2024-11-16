<form wire:submit.prevent="CrearTarea" enctype="multipart/form-data">

    <!-- Botones de acción -->
    <div class="mb-6">
        @include('forms.partials.buttons', [
            'submit' => 'Registrar',
            'reset' => 'Limpiar',
            'cancel' => 'Cancelar',
            'cancelarHref' => route('tasks.create'),
        ])
    </div>

    <!-- Primera fila de campos -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
        <div></div>
        <div class="relative">
            <x-label for="title" :value="__('Título')" />
            <x-input id="title"
                class="block mt-1 w-full rounded-lg shadow-md transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300"
                type="text" wire:model="title" :value="old('title')" maxlength="255"
                pattern="^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ\s]*$" title="Acepta hasta 255 caracteres alfanuméricos y espacios" />
            @error('title')
                <livewire:show-alerts :message="$message" />
            @enderror
        </div>
        <div></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 mb-6">
        <div></div>
        <div class="relative">
            <x-label for="status" :value="__('Estado')" />
            <select id="status" wire:model="status"
                class="block mt-1 w-full rounded-lg shadow-md transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 bg-gray-200 dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">-- Seleccionar Prioridad --</option>
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
            </select>
            @error('status')
                <livewire:show-alerts :message="$message" />
            @enderror
        </div>
        <div class="relative">
            <x-label for="due_date" :value="__('Fecha de Vencimiento')" />
            <x-input id="due_date"
                class="block mt-1 w-full rounded-lg shadow-md transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300"
                type="date" wire:model="due_date" :value="old('due_date')" />
            @error('due_date')
                <livewire:show-alerts :message="$message" />
            @enderror
        </div>
        <div></div>
    </div>


    <div class="relative col-span-2">
        <x-label for="description" :value="__('Descripción')" />
        <textarea id="description" wire:model="description" rows="4"
            class="block p-2.5 w-full gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escribe aquí una descripción de la tarea..." pattern="^[a-zA-Z0-9\s]*$"
            title="Acepta letras, números y espacios"></textarea>
        @error('description')
            <livewire:show-alerts :message="$message" />
        @enderror
    </div>

    w <!-- Botones de acción (final) -->
    <div>
        @include('forms.partials.buttons', [
            'submit' => 'Registrar',
            'reset' => 'Limpiar',
            'cancel' => 'Cancelar',
            'cancelarHref' => route('tasks.create'),
        ])
    </div>

</form>
