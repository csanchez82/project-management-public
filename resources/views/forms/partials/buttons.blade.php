<div class="flex flex-col sm:flex-row justify-center items-center space-y-2 sm:space-y-0 sm:space-x-4 my-5">
    <x-submit-forms>
        {{ $submit ?? __('Enviar') }}
    </x-submit-forms>
    <x-reset-forms>
        {{ $reset ?? __('Limpiar') }}
    </x-reset-forms>
    <x-cancel-forms :href="$cancelarHref ?? '#'">
        {{ $cancel ?? __('Cancelar') }}
    </x-cancel-forms>
</div>
