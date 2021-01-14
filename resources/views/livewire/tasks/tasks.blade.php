<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tareas
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
            </div>


        </div>


        <div class="mt-6" x-data="{ open: false }">

            <!-- Button (blue), duh! -->
            <x-jet-button
                @click="open = true">Nueva Tarea
            </x-jet-button>
            <!-- Dialog (full screen) -->
            <div class="absolute z-20  top-0 left-0 flex items-center justify-center w-full h-full"
                 style="background-color: rgba(0,0,0,.5);" x-show="open">

                <!-- A basic modal dialog with title, body and one button to close -->
                <div class="h-auto w-3/4 text-left bg-gray-100 rounded shadow-xl" @click.away="open = true">
                    <div class="text-center sm:text-left mt-3 ml-4 mr-2">
                        <div class="flex justify-between">
                            <h3 class="text-2xl font-bold leading-6 text-gray-900">
                                Nueva Tarea
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
                        @livewire('tasks.create')
                    </div>

                    <!-- One big close button.  --->
                    <div class="mt-5 sm:mt-6">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 px-15 ">
            @foreach($tareas as $tarea)
                <div
                    class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300 shadow rounded-md p-4 w-full bg-white my-5">
                    <div class="flex">

                        <a  href="{{route('tasks.more',['id'=>$tarea->id])}}"
                            class="flex-row ">
                            <div>

                                <div class="text-lg font-bold">{{$tarea->fecha}}
                                    <span
                                        class=" px-3 py-1 font-semibold text-white text-sm  leading-tight bg-blue-500  rounded-full">
                                        {{$tarea->estado?'En curso':'Finalizada'}}
                                    </span>
                                </div>
                                <p class="text-sm">{{$tarea->hora_inicio}}</p>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm">{{$tarea->descripcion}}</p>
                            </div>

                        </a>
                        <div class="flex w-10 h-10 mt-2 mr-1">
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
                                    <a href="{{route('tasks.more',['id'=>$tarea->id])}}"
                                        class="text-center block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                        Ver más
                                    </a>
                                    <a href="{{route('tasks.update',['id'=>$tarea->id])}}"
                                        class="text-center block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                        Actualizar
                                    </a>
                                    <button wire:click="$emit('modalDelete',{{$tarea->id}})"
                                        class="block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                        Elimninar
                                    </button>
                                    {{--@click="$dispatch('modal-delete',{nameUser:'{{$user->name}}',user:'{{$user}}'})--}}
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>
                </div>
    @endforeach
</div>

<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 pb-20 overflow-x-auto">
    <div class="inline-block min-w-full mt-3 border-2 border-gray-300 rounded-2xl">
        {{--<table class="min-w-full leading-normal mt-2">
            <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Fecha
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Hora de inicio
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Ubicacion
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Estado
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Descripción
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Acción
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($tareas as $tarea)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$tarea->fecha}}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$tarea->hora_inicio}}</p>

                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$tarea->ubicacion}}</p>

                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span
                                    class=" px-3 py-1 font-semibold text-green-900 leading-tight bg-green-200  rounded-full">
                                    {{$tarea->estado?'En curso':'Finalizada'}}
                                </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$tarea->descripcion}}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                        <path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z"></path></svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <button class="block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                    Ver más
                                </button>
                                <button class="block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                    Actualizar
                                </button>
                                <button
                                    class="block w-full py-2 text-sm text-gray-800 hover:bg-gray-400">
                                    Elimninar
                                </button>
                                {{--@click="$dispatch('modal-delete',{nameUser:'{{$user->name}}',user:'{{$user}}'})
                            </x-slot>
                        </x-jet-dropdown>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
     --}}
        <div class="p-5 col-span-1 sm:col-span-2 md:col-end-2 lg:col-span-3 xl:col-span-4">
            {{ $tareas->links('pagination-links') }}
        </div>


    </div>
    <x-delete-task wire:model="showDelete" type="Tarea"
               wire:submit.prevent="deleteTask">

    </x-delete-task>
</div>

</div>







