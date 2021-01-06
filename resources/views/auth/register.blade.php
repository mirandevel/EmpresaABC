<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
            <div class="mt-4">
                <x-jet-label for="ci" value="{{ 'C.I.' }}" />
                <x-jet-input id="ci" class="block mt-1 w-full" type="number" name="ci" :value="old('ci')" required autofocus autocomplete="disabled"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{'Nombre'}}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ 'Correo' }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
                <div class="mt-4">
                    <x-jet-label for="phone" value="{{'Teléfono'}}" />
                    <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
                </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ 'Contraseña' }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ 'Confirmar contraseña' }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password"/>
            </div>


            <div class="mt-4">
                <x-jet-label for="direction" value="{{'Dirección'}}" />
                <x-jet-input id="direction" class="block mt-1 w-full" type="text" name="direction" :value="old('direction')" required />
            </div>


            <div class="mt-4 ">
                <x-jet-label for="type" value="{{'Tipo'}}" />
                    <select id="type" name="type" class="form-select mt-1 block w-full">
                        <option value="{{'t'}}">{{'Técnico'}}</option>
                            <option value="{{'a'}}">{{'Administrador'}}</option>
                    </select>
            </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
