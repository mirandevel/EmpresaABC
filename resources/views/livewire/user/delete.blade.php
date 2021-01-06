
            <div class="text-center sm:text-left mt-3 ml-4 mr-2">
                <div class="flex justify-between">
                    <h3 class="text-2xl font-bold leading-6 text-gray-900">
                        Eliminar Usuario
                    </h3>
                    <button @click="isOpen = false">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="35" height="35" viewBox="0 0 24 24"
                             style="fill:rgb(221,48,48);transform:;-ms-filter:">
                            <path
                                d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M16.207,14.793l-1.414,1.414L12,13.414 l-2.793,2.793l-1.414-1.414L10.586,12L7.793,9.207l1.414-1.414L12,10.586l2.793-2.793l1.414,1.414L13.414,12L16.207,14.793z">
                            </path>
                        </svg>
                    </button>
                </div>
                @if($user!=null)
                    <p class="mt-5">
                        Para eliminar a este usuario, escriba su nombre completo para confirmar
                        que desea eliminar a <span class="text-red-500">{{$user->name}}</span>
                    </p>
                    <form wire:submit.prevent="deleteUser">
                        @csrf
                        <x-jet-label for="name" value="{{'Nombre'}}" class="mt-5"/>
                        <x-jet-input id="name" class="block mt-1 w-full" wire:model="parent.user.name"
                                     type="text" name="name" placeHolder="..."
                                     required/>
                        <div class="flex justify-center my-5">
                            <x-jet-button class="bg-red-500 hover:bg-red-800">
                                {{ __('Eliminar')}}
                            </x-jet-button>
                        </div>
                    </form>
                @else
                    <div class="shadow rounded-md p-4 w-full">
                        <div class="animate-pulse flex space-x-4">
                            <div class="flex-1 space-y-4 py-1">
                                    <div class="h-4 bg-blue-400 rounded mt-5"></div>
                                    <div class="h-4 bg-blue-400 rounded mt-1"></div>
                                    <div class="h-8 bg-blue-400 rounded mt-6"></div>
                                    <div class="flex justify-center my-5">
                                        <x-jet-button class="bg-red-500 hover:bg-red-800">
                                            {{ __('Eliminar')}}
                                        </x-jet-button>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

