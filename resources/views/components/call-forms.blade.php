<a {{ $attributes->merge(['class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 text-white font-semibold text-xs uppercase tracking-widest rounded-md shadow-md hover:from-purple-600 hover:via-blue-500 hover:to-green-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
