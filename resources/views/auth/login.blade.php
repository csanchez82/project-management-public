<x-guest-layout>
    <div class="flex flex-col md:flex-row h-screen items-center justify-center">
        
        <div class="w-full md:w-1/2 p-6 flex justify-center">
            <x-authentication-card class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full">
                <x-slot name="logo">
                    <x-authentication-card-logo class="mx-auto w-16 h-16 mb-4" />
                </x-slot>

                <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Bienvenido</h2>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium  text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                    <div class="mb-4">
                        <x-label for="email" value="Correo Electrónico" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password" value="Contraseña" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2  text-gray-600">Recuérdame</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class=" text-blue-600 hover:">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <x-button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
                        Iniciar Sesión
                    </x-button>
                </form>
            </x-authentication-card>
        </div>

        <div class="w-full md:w-1/2 p-6 flex items-center">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Usuarios Demo</h2>
                    <table class="w-full text-left text-gray-600 border-collapse shadow-md">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-purple-500 text-white">
                                <th class="py-3 px-4  font-semibold">Correo</th>
                                <th class="py-3 px-4  font-semibold">Contraseña</th>
                                <th class="py-3 px-4  font-semibold">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="even:bg-gray-50 odd:bg-white hover:bg-blue-100">
                                <td class="py-3 px-4 border-b">contacto@negsoft.com</td>
                                <td class="py-3 px-4 border-b">contacto@negsoft.com</td>
                                <td class="py-3 px-4 border-b">
                                    <button onclick="copyAndClear('contacto@negsoft.com', 'contacto@negsoft.com')" class="text-blue-600 hover:">
                                        Copiar
                                    </button>
                                </td>
                            </tr>
                            <tr class="even:bg-gray-50 odd:bg-white hover:bg-blue-100">
                                <td class="py-3 px-4 border-b">fabiola@negsoft.com</td>
                                <td class="py-3 px-4 border-b">contacto@negsoft.com</td>
                                <td class="py-3 px-4 border-b">
                                    <button onclick="copyAndClear('fabiola@negsoft.com', 'contacto@negsoft.com')" class="text-blue-600 hover:">
                                        Copiar
                                    </button>
                                </td>
                            </tr>
                            <tr class="even:bg-gray-50 odd:bg-white hover:bg-blue-100">
                                <td class="py-3 px-4">david@negsoft.com</td>
                                <td class="py-3 px-4">contacto@negsoft.com</td>
                                <td class="py-3 px-4">
                                    <button onclick="copyAndClear('david@negsoft.com', 'contacto@negsoft.com')" class="text-blue-600 hover:">
                                        Copiar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyAndClear(email, password) {
            if (confirm("¿Estás seguro de que quieres ingresar con estas credenciales?")) {
                document.getElementById('email').value = email;
                document.getElementById('password').value = password;
                document.getElementById('loginForm').submit();
            }
        }
    </script>
</x-guest-layout>
