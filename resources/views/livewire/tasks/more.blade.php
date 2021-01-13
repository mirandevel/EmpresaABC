<div
    class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300 shadow rounded-md p-4 max-w-sm mx-auto bg-white my-5">
    <a
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
<div class="grid grid-cols-3 justify-items-center border-t-4 border-blue-200 my-15 pt-10">
    {{--Técnico--}}
    <div class="text-lg font-bold text-center">Técnico
    <div class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300  font-normal shadow rounded-md p-4 bg-white mt-2 mb-5 ">
        <a class="flex" href="{{route('users.more',['id'=>$tarea->technical->id])}}">
            @if($tarea->technical!=null)
                <div class="flex w-10 h-10 mt-2 mr-1">
                    <img class="w-full h-full rounded-full"
                         src="{{$tarea->technical->profile_photo_url}}"
                         alt=""/>
                </div>
                <div class="flex-row ">
                    <div>
                        <div class="text-lg font-bold">{{$tarea->technical->name}}
                            <span
                                class=" px-3 py-1 font-semibold text-white text-sm  leading-tight bg-blue-500  rounded-full">
                                        {{$tarea->technical->active?'Activo':'Inactivo'}}
                                    </span>
                        </div>
                        <p class="text-sm">{{$tarea->technical->type=='a'?'Administrador':'Técnico'}}</p>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm">C.I: {{$tarea->technical->ci}}</p>
                        <p class="text-sm">Correo: {{$tarea->technical->email}}</p>
                        <p class="mt-0.5 text-sm">Teléfono: {{$tarea->technical->phone}}</p>
                        <p class="mt-0.5 text-sm">Dirección: {{$tarea->technical->direction}}</p>
                    </div>
                </div>
            @endif
        </a>
    </div>
    </div>
    {{--Administrador--}}
    <div class="text-lg font-bold text-center ">Administrador
        <div class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300  font-normal shadow rounded-md p-4 bg-white mt-2 mb-5 ">
            <a class="flex" href="{{route('users.more',['id'=>$tarea->administrator->id])}}">

            @if($tarea->administrator!=null)
                <div class="flex w-10 h-10 mt-2 mr-1">
                    <img class="w-full h-full rounded-full"
                         src="{{$tarea->administrator->profile_photo_url}}"
                         alt=""/>
                </div>
                <div class="flex-row ">
                    <div>
                        <div class="text-lg font-bold">{{$tarea->administrator->name}}
                            <span
                                class=" px-3 py-1 font-semibold text-white text-sm  leading-tight bg-blue-500  rounded-full">
                                        {{$tarea->administrator->active?'Activo':'Inactivo'}}
                                    </span>
                        </div>
                        <p class="text-sm">{{$tarea->administrator->type=='a'?'Administrador':'Técnico'}}</p>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm">C.I: {{$tarea->administrator->ci}}</p>
                        <p class="text-sm">Correo: {{$tarea->administrator->email}}</p>
                        <p class="mt-0.5 text-sm">Teléfono: {{$tarea->administrator->phone}}</p>
                        <p class="mt-0.5 text-sm">Dirección: {{$tarea->administrator->direction}}</p>
                    </div>
                </div>
            @endif
            </a>
        </div>
    </div>


    <div class="text-lg font-bold text-center">Cliente
        <div class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300  font-normal shadow rounded-md p-4 bg-white mt-2 mb-5 ">
            <a class="flex" href="{{route('clientes.more',['id'=>$tarea->technical->id])}}">
            @if($tarea->technical!=null)
                    <div class="flex w-10 h-10 mt-2 mr-1">
                        <img class="w-full h-full rounded-full"
                             src="{{$tarea->technical->profile_photo_url}}"
                             alt=""/>
                    </div>
                    <div class="flex-row ">
                        <div>
                            <div class="text-lg font-bold">{{$tarea->technical->name}}
                                <span
                                    class=" px-3 py-1 font-semibold text-white text-sm  leading-tight bg-blue-500  rounded-full">
                                        {{$tarea->technical->active?'Activo':'Inactivo'}}
                                    </span>
                            </div>
                            <p class="text-sm">{{$tarea->technical->type=='a'?'Administrador':'Técnico'}}</p>
                        </div>
                        <div class="mt-3">
                            <p class="text-sm">C.I: {{$tarea->technical->ci}}</p>
                            <p class="text-sm">Correo: {{$tarea->technical->email}}</p>
                            <p class="mt-0.5 text-sm">Teléfono: {{$tarea->technical->phone}}</p>
                            <p class="mt-0.5 text-sm">Dirección: {{$tarea->technical->direction}}</p>
                        </div>
                    </div>
                @endif
            </a>
        </div>
    </div>

</div>
