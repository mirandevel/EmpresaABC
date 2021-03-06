<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Usuarios
    </h2>
</x-slot>



<div class="pt-8  mx-auto px-4 sm:px-8  ">
    <div class="flex justify-between">
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="flex flex-row mb-1 sm:mb-0">
                <div class="">
                    <x-jet-label for="paginator" value="{{'Cantidad'}}"/>
                    <select id="paginator" wire:model="paginator" name="paginator"
                            class="form-select mt-1 block w-full">
                        <option value="{{1}}">{{'1'}}</option>
                        <option value="{{5}}">{{'5'}}</option>
                        <option value="{{10}}">{{'10'}}</option>
                        <option value="{{15}}">{{'15'}}</option>
                    </select>

                </div>
                <div class="">
                    <x-jet-label for="type" value="{{'Tipo'}}"/>
                    <select id="type" wire:model="type" name="type" class="form-select mt-1 block w-full">
                        <option value="{{''}}">{{'Todos'}}</option>
                        <option value="{{'t'}}">{{'Técnico'}}</option>
                        <option value="{{'a'}}">{{'Administrador'}}</option>
                    </select>
                </div>
            </div>
            <div class="">
                <x-jet-label for="searchName" value="{{'Búsqueda'}}"/>
                <input id="searchName" wire:model="searchName" name="searchName"
                       class="form-input mt-1 block w-full"/>
            </div>
            <x-loading class="mt-5 ml-3" wire:loading wire:target="searchName,type,paginator"/>
        </div>


        <x-modal :id="0" type="create" >
            <x-slot name="title">
                Nuevo usuario
            </x-slot>
            @livewire('user.create')
        </x-modal>


            <!-- Button (blue), duh! -->

            <x-jet-button class="mt-6 mb-2" x-data="{}"
                @click="$dispatch('{{0}}')">Nuevo usuario
            </x-jet-button>
            <!-- Dialog (full screen) -->
           {{-- <div class="absolute  top-0 left-0 flex items-center justify-center w-full h-full"
                 style="background-color: rgba(0,0,0,.5);" x-show="open">

                <!-- A basic modal dialog with title, body and one button to close -->
                <div class="h-auto w-3/4 text-left bg-gray-100 rounded shadow-xl" @click.away="open = true">
                    <div class="text-center sm:text-left mt-3 ml-4 mr-2">
                        <div class="flex justify-between">
                            <h3 class="text-2xl font-bold leading-6 text-gray-900">
                                Nuevo Usuario
                            </h3>
                            <button @click="open = false">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="35" height="35" viewBox="0 0 24 24"
                                     style="fill:rgb(221,48,48);transform:;-ms-filter:">
                                    <path
                                        d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M16.207,14.793l-1.414,1.414L12,13.414 l-2.793,2.793l-1.414-1.414L10.586,12L7.793,9.207l1.414-1.414L12,10.586l2.793-2.793l1.414,1.414L13.414,12L16.207,14.793z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        @livewire('user.create')
                    </div>

                    <!-- One big close button.  --->
                    <div class="mt-5 sm:mt-6">
                    </div>

                </div>
            </div>
            --}}


    </div>


    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 pb-20 overflow-x-auto">
        <div class="inline-block min-w-full mt-3 border-2 border-gray-300 rounded-2xl">
            <table class="min-w-full leading-normal mt-2">
                <thead>
                <tr class="text-center">
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tipo
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Inicio
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Estado
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Acción
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex justify-center">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-full h-full rounded-full"
                                         src="{{$user->profile_photo_url}}"
                                         alt=""/>
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$user->name}}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{$user->type=='a'?'Administrador':'Técnico'}}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{$user->created_at}}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class=" px-3 py-1 font-semibold text-green-900 leading-tight bg-green-200  rounded-full">
                                        {{$user->active?'Activo':'Inactivo'}}
                                    </span>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24"
                                             style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                            <path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z"></path>
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <a href="{{route('users.more',['id' => $user->id])}}"
                                        class="block w-full py-2 text-sm text-gray-800 hover:bg-gray-400 text-center">
                                        Ver más
                                    </a>
                                    @if($user->id!=\Illuminate\Support\Facades\Auth::user()->id)
                                    <button wire:click="$emit('modalUpdate',{{$user}})"
                                        class="block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                        {{$user->active?'Deshabilitar':'Habilitar'}}
                                    </button>
                                    <button wire:click="$emit('modalDelete',{{$user}})"
                                            class="block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                        Elimninar
                                    </button>
                                    @endif
                                    {{--@click="$dispatch('modal-delete',{nameUser:'{{$user->name}}',user:'{{$user}}'})--}}
                                </x-slot>
                            </x-jet-dropdown>


                        </td>
                    </tr>

                {{--}}    <x-modal :id="'more'.$user->id" type="more">
                        <x-slot name="title">
                            Ver más
                        </x-slot>
                        <div class="text-center">
                            <x-jet-label for="ci" value="{{ 'C.I.' }}" />
                        <span id="ci" name="ci">{{__('Nombre: ').$user->name}}</span> <br/>
                        <span >{{$user->ci}}</span><br/>
                        <span >{{$user->email}}</span><br/>
                        <span >{{$user->phone}}</span><br/>
                        <span >{{$user->direction}}</span><br/>
                        <span >{{$user->type=='a'?'Administrador':'Técnico'}}</span><br/>
                        </div>
                    </x-modal>

                    <x-modal :id="'update'.$user->id" type="update">
                        <x-slot name="title">
                            Eliminar Usuario
                        </x-slot>

                    </x-modal>

                    <x-modal :id="'delete'.$user->id" type="delete">
                        <x-slot name="title">
                            Eliminar Usuario
                        </x-slot>
                        @livewire('user.delete',['user' => $user],key($user->id))
                    </x-modal>--}}
                @endforeach
                </tbody>
            </table>
            <div class="p-5 col-span-1 sm:col-span-2 md:col-end-2 lg:col-span-3 xl:col-span-4">
                {{ $users->links('pagination-links') }}
            </div>
        </div>
        <x-jet-dialog-modal  wire:model="showUpdate">
            <x-slot name="title">
                <div class="flex justify-center">
                @if($currentUser!=null)
                {{$currentUser->active?'Deshabilitar':'Habilitar'}}
                @endif
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="flex justify-center">
                @if($currentUser!=null)
                ¿Esta seguro de {{$currentUser->active?'Deshabilitar':'Habilitar'}} al usuario
                {{$currentUser->name}}?
                @endif
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-center">
                <x-jet-button class="bg-blue-500" wire:click="$emit('habilitar')">
                    @if($currentUser!=null)
                        {{$currentUser->active?'Deshabilitar':'Habilitar'}}
                    @endif
                </x-jet-button>
                </div>
            </x-slot>
        </x-jet-dialog-modal>

        <x-more wire:model="showMore">
                <div class="border border-blue-300 shadow rounded-md p-4 max-w-sm mx-auto">
                    <div class="flex">
                        @if($currentUser!=null)
                        <div class="flex w-10 h-10 mt-2 mr-1">
                            <img class="w-full h-full rounded-full"
                                 src="{{$currentUser->profile_photo_url}}"
                                 alt=""/>
                        </div>
                        <div class="flex-row ">
                            <div>
                                <div class="text-lg font-bold">{{$currentUser->name}}
                                    <span
                                        class=" px-3 py-1 font-semibold text-white text-sm  leading-tight bg-blue-500  rounded-full">
                                        {{$currentUser->active?'Activo':'Inactivo'}}
                                    </span>
                                </div>
                                <p class="text-sm">{{$currentUser->type=='a'?'Administrador':'Técnico'}}</p>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm">C.I: {{$currentUser->ci}}</p>
                                <p class="text-sm">Correo: {{$currentUser->email}}</p>
                                <p class="mt-0.5 text-sm">Teléfono: {{$currentUser->phone}}</p>
                                <p class="mt-0.5 text-sm">Dirección: {{$currentUser->direction}}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
        </x-more>
        <x-delete wire:model="showDelete" type="Ususario"
                 :currentName="$currentName" wire:loading wire:target="name"
                 :name="$name" wire:submit.prevent="deleteUser">

        </x-delete>
    </div>


</div>




