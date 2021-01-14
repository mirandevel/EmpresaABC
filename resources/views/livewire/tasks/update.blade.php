<x-jet-authentication-card>
    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>


    <form wire:submit.prevent="update">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="mt-4">
                <!-- component -->

                <style>
                    [x-cloak] {
                        display: none;
                    }
                </style>

                <div class="antialiased sans-serif">
                    <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>


                        <x-jet-label for="datepicker" value="{{'Seleccione la fecha'}}" />
                        <div class="relative">


                            {{--<input type="text" name="date" x-ref="date">--}}

                            <x-jet-input

                                id="fecha"
                                name="fecha"
                                type="text"

                                x-model="datepickerValue"
                                @click="showDatepicker = !showDatepicker"
                                class="form-input rounded-md shadow-sm block mt-1 w-full"
                                placeholder="Seleccione"/>

                            <x-jet-button @click="showDatepicker = !showDatepicker"
                                          type="button" class="absolute top-0 right-0">
                                <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </x-jet-button>


                            <!-- <div x-text="no_of_days.length"></div>
                            <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                            <div x-text="new Date(year, month).getDay()"></div> -->

                            <div
                                class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                style="width: 17rem"
                                x-show.transition="showDatepicker"
                                @click.away="showDatepicker = false">

                                <div class="flex justify-between items-center mb-2">
                                    <div>
                                        <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                        <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                    </div>
                                    <div>
                                        <button
                                            type="button"
                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                            :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                            :disabled="month == 0 ? true : false"
                                            @click="month--; getNoOfDays()">
                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                            </svg>
                                        </button>
                                        <button
                                            type="button"
                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                            :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                            :disabled="month == 11 ? true : false"
                                            @click="month++; getNoOfDays()">
                                            <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex flex-wrap mb-3 -mx-1">
                                    <template x-for="(day, index) in DAYS" :key="index">
                                        <div style="width: 14.26%" class="px-1">
                                            <div
                                                x-text="day"
                                                class="text-gray-800 font-medium text-center text-xs"></div>
                                        </div>
                                    </template>
                                </div>

                                <div class="flex flex-wrap -mx-1">
                                    <template x-for="blankday in blankdays">
                                        <div
                                            style="width: 14.28%"
                                            class="text-center border p-1 border-transparent text-sm"
                                        ></div>
                                    </template>
                                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                        <div style="width: 14.28%" class="px-1 mb-1">
                                            <div
                                                @click="getDateValue(date)"
                                                x-text="date"
                                                class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"
                                            ></div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                        </div>

                    </div>

                    <script>
                        const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                        const DAYS = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];

                        function app() {
                            return {
                                showDatepicker: false,
                                datepickerValue: '',

                                month: '',
                                year: '',
                                no_of_days: [],
                                blankdays: [],
                                days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],

                                initDate() {
                                    let today = new Date();
                                    this.month = today.getMonth();
                                    this.year = today.getFullYear();

                              //  @this.task.fecha=this.year +"-"+ ('0'+ (this.month+1)).slice(-2) +"-"+ ('0' + today.getDate()).slice(-2);

                                    this.datepickerValue =@this.task.fecha;
                                        //new Date(this.year, this.month, today.getDate()).toLocaleDateString();
                                    //  this.$refs.date.value = this.year +"-"+ ('0'+ (this.month+1)).slice(-2) +"-"+ ('0' + today.getDate()).slice(-2);

                                },

                                isToday(date) {
                                    const today = new Date();
                                    const d = new Date(this.year, this.month, date);

                                    return today.toDateString() === d.toDateString() ? true : false;
                                },

                                getDateValue(date) {
                                    let selectedDate = new Date(this.year, this.month, date);

                                    this.datepickerValue = selectedDate.toLocaleDateString()
                                @this.task.fecha=selectedDate.getFullYear() +"-"+ ('0'+ (selectedDate.getMonth()+1)).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);

                                    //this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ (selectedDate.getMonth()+1)).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);

                                    console.log(this.$refs.date.value);

                                    this.showDatepicker = false;
                                },

                                getNoOfDays() {
                                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                                    // find where to start calendar day of week
                                    let dayOfWeek = new Date(this.year, this.month).getDay();
                                    let blankdaysArray = [];
                                    for ( var i=1; i <= dayOfWeek; i++) {
                                        blankdaysArray.push(i);
                                    }

                                    let daysArray = [];
                                    for ( var i=1; i <= daysInMonth; i++) {
                                        daysArray.push(i);
                                    }

                                    this.blankdays = blankdaysArray;
                                    this.no_of_days = daysArray;
                                }
                            }
                        }
                    </script>
                </div>

            </div>
            <div class="mt-4 ">
                <x-jet-label  value="{{'Hora'}}" />
                <div class="mt-1 block w-full border border-gray-300 rounded-md flex justify-center">
                    <select name="hours" wire:model.defer="hora" class=" form-select bg-transparent appearance-none outline-none">

                        <option value="">00</option>
                        <option value="{{6}}">06</option>
                        <option value="{{7}}">07</option>
                        <option value="{{8}}">08</option>
                        <option value="{{9}}">09</option>
                        <option value="{{10}}">10</option>
                        <option value="{{11}}">11</option>
                        <option value="{{12}}">12</option>
                        <option value="{{13}}">13</option>
                        <option value="{{14}}">14</option>
                        <option value="{{15}}">15</option>
                        <option value="{{16}}">16</option>
                        <option value="{{17}}">17</option>
                        <option value="{{18}}">18</option>

                    </select>
                    @error('hora')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

                    <span class="text-xl mx-2">:</span>
                    <select name="minutes" wire:model.defer="minuto" class=" form-select  bg-transparent appearance-none outline-none mr-4">
                        <option value="{{0}}">00</option>
                        <option value="{{15}}">15</option>
                        <option value="{{30}}">30</option>
                        <option value="{{45}}">45</option>
                    </select>
                    @error('minuto')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

                </div>
            </div>


            <div class="mt-4">
                <x-jet-label for="ubicacion" value="{{ 'Ubicacion' }}" />
                <x-jet-input id="ubicacion" wire:model.defer="task.ubicacion" class="block mt-1 w-full" type="text" name="ubicacion" :value="old('ubicacion')" required />
                @error('ubicacion')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

            </div>
            <div class="mt-4">
                <x-jet-label for="descripcion" value="{{'Descripción'}}" />
                <x-jet-input id="descripcion" wire:model.defer="task.descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required />
                @error('descripcion') <x-jet-label class="text-red-400 italic" value="{{ $message}}" />  @enderror

            </div>
            <div class="mt-4">
                <x-jet-label for="tecnico" value="{{ 'Técnico' }}" />
                <x-jet-input id="tecnico" wire:model.defer="task.tec_id" class="block mt-1 w-full" type="text" name="tecnico"  required />
                @error('tec_id')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

            </div>


            <div class="mt-4">
                <x-jet-label for="cliente" value="{{ 'Cliente' }}" />
                <x-jet-input id="cliente" wire:model.defer="task.cli_id" class="block mt-1 w-full" type="text" name="cliente" required />
                @error('cli_id')  <x-jet-label class="text-red-400 italic" value="{{ $message}}" /> @enderror

            </div>
        </div>

        <div class="flex items-center justify-center mt-4">
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                    type="submit">{{'Actualizar'}}</button>
        </div>
    </form>
</x-jet-authentication-card>


