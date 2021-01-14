<div class="text-lg font-bold text-center mt-5">Cliente
    <div
        class="group  hover:bg-white hover:shadow-lg hover:border-transparent border border-blue-300 shadow rounded-md p-4 max-w-sm mx-auto bg-white my-5">
        <a class="flex-row">
            @if($cliente!=null)
                <div class="flex-row ">
                    <div>
                        <div class="text-lg font-bold">{{$cliente->nombre}}
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm">Correo: {{$cliente->correo}}</p>
                        <p class="mt-0.5 text-sm">Teléfono: {{$cliente->telefono}}</p>
                        <p class="mt-0.5 text-sm">Dirección: {{$cliente->direccion}}</p>
                    </div>
                </div>
            @endif
        </a>
    </div>
    <div class="text-lg font-bold text-center">Tareas solicitadas
    </div>
    </div>
<div class="grid grid-cols-3 gap-4 px-5">
        @foreach($cliente->tasks as $tarea)
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
                </div>
            </div>
        @endforeach
</div>
