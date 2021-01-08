@props([
'currentName',
'name',
'type'
])
<x-jet-dialog-modal  {{$attributes}}>
    <x-slot name="title">
        Eliminar {{$type}}
    </x-slot>

    <x-slot name="content">
        <div>
            <p class="mt-5">
                Para eliminar a este usuario, escriba su nombre completo para confirmar
                que desea eliminar a <span class="text-red-500">{{$currentName}}</span>
            </p>
            <form {{$attributes->wire('submit.prevent') }} >
                @csrf
                <x-jet-label for="name" value="{{'Nombre'}}" class="mt-5"/>
                <x-jet-input id="name" class="block mt-1 w-full" wire:model="name"
                             type="text" name="name" placeHolder="..."
                />
                <div class="flex justify-center my-5">
                    <x-loading {{$attributes}}>

                    </x-loading>
                </div>
                <div class="flex justify-center my-5">
                    @php
                        $enabled='disabled';
                    @endphp
                    @if(strtolower($currentName)==strtolower($name))
                        @php
                            $enabled='enabled';
                        @endphp
                    @endif

                    <x-jet-button class="bg-red-500 hover:bg-red-800" :enabled="$enabled">
                        {{ __('Eliminar')}}
                    </x-jet-button>
                </div>


            </form>

        </div>

    </x-slot>

    <x-slot name="footer">

    </x-slot>
</x-jet-dialog-modal>
