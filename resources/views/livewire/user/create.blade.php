 <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>


        <form wire:submit.prevent="saveUser">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="mt-4">
                    <x-jet-label for="ci" value="{{ 'C.I.' }}" />
                    <x-jet-input id="ci" wire:model.defer="ci" class="block mt-1 w-full" type="number" name="ci" :value="old('ci')" required autofocus autocomplete="disabled"/>
                    @error('ci') <x-jet-label class="text-red-400 italic"  value="{{ $message}}" /> @enderror
                </div>

                <div class="mt-4">
                    <x-jet-label for="name" value="{{'Nombre'}}" />
                    <x-jet-input wire:model.defer="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
                    @error('name')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ 'Correo' }}" />
                    <x-jet-input id="email" wire:model.defer="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    @error('email')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

                </div>
                <div class="mt-4">
                    <x-jet-label for="phone" value="{{'Teléfono'}}" />
                    <x-jet-input id="phone" wire:model.defer="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
                    @error('phone') <x-jet-label class="text-red-400 italic" value="{{ $message}}" />  @enderror

                </div>
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ 'Contraseña' }}" />
                    <x-jet-input id="password" wire:model.defer="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>
                    @error('password')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" />  @enderror

                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ 'Confirmar contraseña' }}" />
                    <x-jet-input id="password_confirmation" wire:model.defer="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password"/>
                    @error('password_confirmation')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" />  @enderror

                </div>


                <div class="mt-4">
                    <x-jet-label for="direction" value="{{'Dirección'}}" />
                    <x-jet-input id="direction" wire:model.defer="direction" class="block mt-1 w-full" type="text" name="direction" :value="old('direction')" required />
                    @error('direction')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" />  @enderror

                </div>


                <div class="mt-4 ">
                    <x-jet-label for="type" value="{{'Tipo'}}" />
                    <select id="type" wire:model.defer="type" name="type" class="form-select mt-1 block w-full">
                        <option value="{{'t'}}">{{'Técnico'}}</option>
                        <option value="{{'a'}}">{{'Administrador'}}</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                        type="submit">Guardar</button>
            </div>
        </form>
    </x-jet-authentication-card>

