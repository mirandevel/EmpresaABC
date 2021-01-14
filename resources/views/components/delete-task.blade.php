@props([
'type'
])
<x-jet-dialog-modal  {{$attributes}}>
    <x-slot name="title">
        Eliminar {{$type}}
    </x-slot>

    <x-slot name="content">
        <div>
            <p class="mt-5">
                ¿Esta seguro que desea eliminar esta tarea?
            </p>
            <form {{$attributes->wire('submit.prevent') }} >
                @csrf
                <div class="flex justify-center my-5">
                    <x-jet-button class="bg-red-500 hover:bg-red-800">
                        {{ __('Eliminar')}}
                    </x-jet-button>
                </div>

            </form>

        </div>

    </x-slot>

    <x-slot name="footer">

    </x-slot>
</x-jet-dialog-modal>
