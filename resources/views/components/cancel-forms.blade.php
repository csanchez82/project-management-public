@php
    $classes = 'relative inline-flex items-center justify-center px-6 py-3 bg-gradient-to-br from-red-500 via-yellow-500 to-orange-500 text-white font-semibold text-xs uppercase tracking-widest rounded-md shadow-md hover:bg-gradient-to-br hover:from-orange-500 hover:via-yellow-500 hover:to-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 transition-all ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="relative transition-all ease-in duration-75 bg-transparent rounded-md group-hover:bg-opacity-0">
        {{ $slot }}
    </span>
</a>
