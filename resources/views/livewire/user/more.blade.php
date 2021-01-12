<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Usuarios
    </h2>
</x-slot>


<div class="border border-blue-300 shadow rounded-md p-4 max-w-sm mx-auto bg-white my-5">
    <div class="flex">
        @if($user!=null)
            <div class="flex w-10 h-10 mt-2 mr-1">
                <img class="w-full h-full rounded-full"
                     src="{{$user->profile_photo_url}}"
                     alt=""/>
            </div>
            <div class="flex-row ">
                <div>
                    <div class="text-lg font-bold">{{$user->name}}
                        <span
                            class=" px-3 py-1 font-semibold text-white text-sm  leading-tight bg-blue-500  rounded-full">
                                        {{$user->active?'Activo':'Inactivo'}}
                                    </span>
                    </div>
                    <p class="text-sm">{{$user->type=='a'?'Administrador':'Técnico'}}</p>
                </div>
                <div class="mt-3">
                    <p class="text-sm">C.I: {{$user->ci}}</p>
                    <p class="text-sm">Correo: {{$user->email}}</p>
                    <p class="mt-0.5 text-sm">Teléfono: {{$user->phone}}</p>
                    <p class="mt-0.5 text-sm">Dirección: {{$user->direction}}</p>
                </div>
            </div>
        @endif
    </div>
</div>

<div x-data="{ openTab: 1 }" class="w-full">
    <ul class="list-reset flex justify-center border-b mb-12 space-x-1">
        <li @click="openTab = 1" class="-mb-px">
            <button
                class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold border-blue-200
border-transparent focus:outline-none focus:ring-2 focus:border-blue-600 focus:border-transparent"
            >Tareas encomendadas
            </button>
        </li>
        <li @click="openTab = 2" class="-mb-px">
            <button
                class="bg-white inline-block {{$tab==2?'border-l border-t border-r':''}} rounded-t py-2 px-4 text-blue-700 font-semibold"
            >Asistencias
            </button>
        </li>
    </ul>
    <div x-show="openTab === 1">
        <div class="grid grid-cols-3 gap-4">
            @for ($i = 0; $i < 10; $i++)
                @forelse($tareas as $tarea)
                    <div
                       class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300 shadow rounded-md p-4 max-w-sm mx-auto bg-white my-5">
                        <a href="{{route('tasks.more',['id'=>$tarea->id])}}"
                            class="flex-row">

                            <div class="flex-row ">
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


                            </div>

                        </a>
                        <div class="mt-3">
                            <button onclick="window.open('{{ url($tarea->ubicacion) }}')"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded rounded-2xl inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                    <path
                                        d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z">
                                    </path>
                                </svg>
                                <span>Ver en mapa</span>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="text-lg font-bold">No se le signo ninguna tarea</div>
                @endforelse
            @endfor
        </div>

    </div>


    {{--Tab 3--}}
    <div x-show="openTab === 2">
        <div class="grid grid-cols-3 gap-4">
            @for ($i = 0; $i < 10; $i++)
                @forelse($asistencias as $asistencia)
                    <a
                        class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300 shadow rounded-md p-4 max-w-sm mx-auto bg-white my-5">
                        <div class="flex">

                            <div class="flex-row ">
                                <div>

                                    <div class="text-lg font-bold">{{$asistencia->fecha}}
                                        <span
                                            class=" px-3 py-1 font-semibold text-white text-sm  leading-tight bg-blue-500  rounded-full">
                                        {{$asistencia->estado?'En curso':'Finalizada'}}
                                    </span>
                                    </div>
                                    <p class="text-sm">Inicio: {{$asistencia->hora_inicio}}</p>
                                    <p class="text-sm">Finalizado: {{$asistencia->hora_fin}}</p>
                                </div>
                                <div class="mt-3">
                                    <p class="text-sm">{{$asistencia->descripcion}}</p>
                                </div>
                                <div class="mt-3">
                                    <button onclick="window.location='{{ url($asistencia->ubicacion) }}'"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded rounded-2xl inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                            <path
                                                d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z">
                                            </path>
                                        </svg>
                                        <span>Ver en mapa</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-lg font-bold">No tiene asistencias</div>
                @endforelse
            @endfor
        </div>

    </div>
</div>
