<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

        @foreach ($this->capacitaciones as $capacitacion)
        <x-mary-card :title="$capacitacion->nombre" separator class="hover:shadow-xl card-bordered">
            <div class="grid grid-cols-1  gap-2">
                <p class="flex text-xs space-x-5">
                    <span>
                        <span class="font-bold">Creditos:</span>
                        <span class="ml-1 italic">
                            {{$capacitacion->creditos}}
                        </span>
                    </span>
                    <span>
                        <span class="font-bold">N° Horas:</span> <span class="ml-1 italic">
                            {{$capacitacion->numero_horas}}
                        </span>
                    </span>
                </p>
                <p class="text-xs">
                    <span class="font-bold"> Modalidad:</span>
                    <span class="ml-1 italic">
                        {{$capacitacion->modalidad->nombre}}
                    </span>
                </p>
                <div class="grid grid-cols-2 mt-1">
                    <p class="text-xs">
                        <span class="font-bold"> Vacantes:</span>
                        <span class="ml-1 italic">
                            {{$capacitacion->is_libre ? 'Libre' : $capacitacion->vacantes}}
                        </span>
                    </p>
                    <p class="text-xs">
                        <span class="font-bold"> Costo:</span>
                        <span class="ml-1 italic">
                            S/. 90.00
                        </span>
                    </p>
                </div>

                <br>
                <p class="text-sm">
                    Del:
                    <span class="">
                        {{$capacitacion->fecha_inicio_format}}
                    </span> al:
                    <span class="">
                        {{$capacitacion->fecha_fin_format}}
                    </span>
                </p>
                <div class="mt-5 justify-self-end">
                    <x-button label="Inscribir" class="btn-warning" />
                </div>
            </div>


            <x-slot:menu>
                <x-mary-badge value="Libre" @class(['badge-warning','hidden'=>!$capacitacion->is_libre]) />
            </x-slot:menu>
        </x-mary-card>
        @endforeach
    </div>
</div>