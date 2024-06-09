<x-mary-tabs wire:model="selected_tab">
    <x-mary-tab name="datos-generales" label="Datos Generales" icon="o-users">
        <x-card title="Tipo de capacitacion">
            <x-checkbox id="right-label" label="¿Será un curso de libre acceso?" wire:model.live="form.is_libre" />
            <br>
            <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-4">
                <x-select label="Modalidad" placeholder="Seleccione una opción" :options="$this->modalidades"
                    option-label="nombre" option-value="id" wire:model.blur="form.modalidad_id" />
                <x-input label="Numero de Horas" wire:model.blur="form.numero_horas" />
                <x-input label="Créditos" wire:model.blur="form.creditos" />
                <div x-show="!$wire.form.is_libre">
                    <x-input label="Vacantes" wire:model.blur="form.vacantes" />
                </div>
            </div>

        </x-card>
        <br>
        <x-card title="Datos">
            <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-4">
                <x-input label="Codigo" wire:model.blur="form.codigo" />
                <x-input label="Nombre" wire:model.blur="form.nombre" />
                <x-input label="Fecha de Inicio" parse-format="YYYY-MM-DD" display-format="DD/MM/YYYY" type="date"
                    wire:model.blur="form.fecha_inicio" />
                <x-input label="Fecha Fin" parse-format="YYYY-MM-DD" display-format="DD/MM/YYYY" type="date"
                    wire:model.blur="form.fecha_fin" />
                <x-select label="Tipo de Capacitación" placeholder="Seleccione una opción"
                    :options="$this->tipo_capacitaciones" option-label="nombre" option-value="id"
                    wire:model.blur="form.tipo_capacitacion_id" />
                <x-select label="Eje Temático" placeholder="Seleccione una opción" :options="$this->ejes_tematicos"
                    option-label="nombre" option-value="id" wire:model.blur="form.eje_tematico_id" />

                <x-select label="Oportunidad" placeholder="Seleccione una opción" :options="$this->oportunidades"
                    option-label="nombre" option-value="id" wire:model.blur="form.oportunidad_id" />
                <x-select label="Nivel de Evaluación" placeholder="Seleccione una opción" :options="$this->niveles"
                    option-label="nombre" option-value="id" wire:model.blur="form.nivel_ids" multiselect />


            </div>

        </x-card>
    </x-mary-tab>
    <x-mary-tab name="datos-especificos" label="Datos Especificos" icon="o-sparkles">
        <div class="grid grid-cols-1 md:grid-cols-2 sm:grid-cols-2 gap-2">
            <x-textarea label="Perfil" wire:model.blur="form.perfil" />
            <x-textarea label="Problema" wire:model.blur="form.problema" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 sm:grid-cols-2 gap-2">
            <x-textarea label="Objetivo de Aprendizaje" wire:model.blur="form.objetivo_aprendizaje" />
            <x-textarea label="Objetivo de Desempeño" wire:model.blur="form.objetivo_desempeño" />
        </div>
    </x-mary-tab>
    <x-mary-tab name="datos-servir" label="Servir" icon="o-musical-note">
        <div class="w-1/2 mx-auto">
            @foreach ($form->capacitacion_item as $item)
            <div class="p-3 flex border-t cursor-pointer">
                <x-select :label="$item['nombre']" placeholder="Seleccione una opción" :options="$item['respuestas']"
                    option-label="nombre" option-value="id"
                    wire:model.blur="form.capacitacion_item.{{$item['item_id']}}.respuesta_id" />
                <div class="flex-shrink w-8 relative">
                    <x-mary-badge
                        value="{{isset($form->capacitacion_item[$item['item_id']]['respuesta_id']) ? $form->capacitacion_item[$item['item_id']]['respuestas'][$form->capacitacion_item[$item['item_id']]['respuesta_id']]['valor']: ''}}"
                        label="Valor" class="absolute inset-x-1 inset-y-7 flex badge-warning badge-lg" />

                </div>
            </div>
            @endforeach

        </div>
    </x-mary-tab>
    <x-mary-tab name="datos-costos" label="Costos" icon="o-musical-note">
        <div class="grid grid-cols-1 md:grid-cols-2 sm:grid-cols-2 gap-2">
            <div class="join flex items-end">
                <x-select label="Costo" placeholder="Seleccione una opción" :options="$this->costos"
                    option-label="nombre" option-value="id" wire:model.defer="costo_id" />
                <x-button squared primary label="Agregar" class="h-9 join-item rounded-r-full" wire:click="addCosto"
                    spinner="addCosto" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
            @foreach(config('appSection-costo.tipos_costo') as $index => $tipoCosto)
            <x-card title=" Costos {{$index}}s ">
                @foreach($form->capacitacion_costo as $selectedCosto)
                @if ($selectedCosto['tipo'] === $index)
                <div class="flex items-baseline gap-2">
                    <x-input label="Costo" class="flex-1" :value="$selectedCosto['nombre']" readonly disabled />
                    <x-input label="Valor" class="flex-auto"
                        wire:model.blur="form.capacitacion_costo.{{$selectedCosto['costo_id']}}.valor" />
                    <div class="flex-shrink w-8 relative">
                        <x-mary-button wire:click="removeCosto({{ $selectedCosto['costo_id'] }})"
                            class="absolute inset-x-1 inset-y-3 flex items-center btn-sm btn-circle btn-error"
                            icon="o-trash" />

                    </div>

                </div>
                @endif
                @endforeach
            </x-card>
            @endforeach
        </div>
    </x-mary-tab>
</x-mary-tabs>

@script
<script>
    Alpine.data('counter', () => {
        return {
            count: 0,
            increment() {
                console.log($wire.form.capacitacion_item)
                this.count++
            },
        }
    })
</script>
@endscript