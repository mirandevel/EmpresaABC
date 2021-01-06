<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>
        <div>
            <div class="mt-4 text-center text-xl">
                Usted no es un administrador <br>
                Si es un técnico descargue la aplicación
                <a class="underline text-xl text-gray-600 hover:text-gray-900" href="timbaldb.ga">
                    aquí
                </a>
            </div>
            <div class="flex items-center justify-center mt-4">

                <a href="{{route('login')}}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Volver
                </a>
            </div>
        </div>
    </x-jet-authentication-card>

</x-guest-layout>
