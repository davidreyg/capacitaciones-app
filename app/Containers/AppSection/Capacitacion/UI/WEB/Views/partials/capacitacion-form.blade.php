{{--
<x-mary-errors title="Oops!" description="Please, fix them." icon="o-face-frown" /> --}}
<x-mary-tabs wire:model="selected_tab">
    <x-mary-tab name="datos-generales" label="Datos Generales" icon="o-users">
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-4">
            <x-input label="Nombre" wire:model.blur="form.nombre" />
            <x-input label="Codigo" wire:model.blur="form.codigo" />
            <x-input label="Fecha de Inicio" parse-format="YYYY-MM-DD" display-format="DD/MM/YYYY" type="date"
                wire:model.blur="form.fecha_inicio" />
            <x-input label="Fecha Fin" parse-format="YYYY-MM-DD" display-format="DD/MM/YYYY" type="date"
                wire:model.blur="form.fecha_fin" />
            <x-select label="Tipo de Capacitación" placeholder="Seleccione una opción" :options="$tipo_capacitaciones"
                option-label="nombre" option-value="id" wire:model.blur="form.tipo_capacitacion_id" />
            <x-select label="Eje Temático" placeholder="Seleccione una opción" :options="$ejes_tematicos"
                option-label="nombre" option-value="id" wire:model.blur="form.eje_tematico_id" />
            <x-select label="Modalidad" placeholder="Seleccione una opción" :options="$modalidades"
                option-label="nombre" option-value="id" wire:model.blur="form.modalidad_id" />
            <x-select label="Oportunidad" placeholder="Seleccione una opción" :options="$oportunidades"
                option-label="nombre" option-value="id" wire:model.blur="form.oportunidad_id" />
            <x-select label="Nivel de Evaluación" placeholder="Seleccione una opción" :options="$niveles"
                option-label="nombre" option-value="id" wire:model.blur="form.nivel_ids" multiselect />

            <x-input label="Numero de Horas" wire:model.blur="form.numero_horas" />
            <x-input label="Créditos" wire:model.blur="form.creditos" />
        </div>
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
        <ul>
            @foreach ($items as $index =>$item)
            <li>
                <x-select :label="$item->nombre" placeholder="Seleccione una opción" :options="$item->respuestas"
                    option-label="nombre" option-value="id"
                    wire:model.blur="form.capacitacion_item.{{$index}}.respuesta_id">
                </x-select>
                @if ($form->capacitacion_item[$index]['respuesta_id'])

                <span>
                    {{ $item->respuestas->where('id',
                    $form->capacitacion_item[$index]['respuesta_id'])->first()->pivot->valor }}
                </span>
                @endif
            </li>
            @endforeach
        </ul>
    </x-mary-tab>
    <x-mary-tab name="datos-costos" label="Costos" icon="o-musical-note">
        <div class="max-w-lg mx-auto">
            @foreach ($items as $index =>$item)
            <div class="p-3 flex items-end justify-between border-t cursor-pointer hover:bg-gray-200">
                <x-select :label="$item->nombre" placeholder="Seleccione una opción" :options="$item->respuestas"
                    option-label="nombre" option-value="id"
                    wire:model.blur="form.capacitacion_item.{{$index}}.respuesta_id" />
                @if ($form->capacitacion_item[$index]['respuesta_id'])

                <x-input value="{{ $item->respuestas->where('id',
                        $form->capacitacion_item[$index]['respuesta_id'])->first()->pivot->valor }}" label="Valor"
                    readonly class="input-warning" />

                @endif
            </div>
            @endforeach

        </div>
    </x-mary-tab>
</x-mary-tabs>