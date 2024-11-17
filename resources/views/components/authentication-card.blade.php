<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <!-- Encabezado NegSoft -->
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-gray-800 dark:text-gray-100">
            Neg<span class="text-blue-600 dark:text-blue-400">Soft</span> México
        </h1>
        <p class="mt-2 text-gray-600 dark:text-gray-300 text-sm italic">
            "Software para tu negocio"
        </p>
    </div>

    <!-- Contenedor -->
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
