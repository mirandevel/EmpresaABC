<x-jet-authentication-card>
    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>


    <form wire:submit.prevent="submit">
        @csrf
        <div class="grid grid-cols-2 gap-4">

            <div class="mt-4">
                <x-jet-label for="name"  value="{{'Nomb re'}}" />
                <x-jet-input wire:model="nombre" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
                @error('name')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

            </div>
            <!-- component -->


            <div class="mt-4">
                <x-jet-label for="direccion" value="{{ 'Dirección' }}" />
                <x-jet-input id="direccion" wire:model.defer="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required />
                @error('email')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ 'Correo' }}" />
                <x-jet-input id="email" wire:model.defer="correo" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                @error('email')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{'Teléfono'}}" />
                <x-jet-input id="phone" wire:model.defer="telefono" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
                @error('phone') <x-jet-label class="text-red-400 italic" value="{{ $message}}" />  @enderror

            </div>
        </div>

        <div class="flex items-center justify-center mt-4">
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                    type="submit">{{'Crear'}}</button>
        </div>
    </form>
</x-jet-authentication-card>


