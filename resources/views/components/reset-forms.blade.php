<button {{ $attributes->merge(['type' => 'reset', 'class' => 'relative inline-flex items-center justify-center px-6 py-3 bg-gradient-to-br from-pink-500 to-orange-400 text-white font-semibold text-xs uppercase tracking-widest rounded-md shadow-md hover:from-orange-400 hover:to-pink-500 focus:ring-4 focus:outline-none focus:ring-pink-200 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
