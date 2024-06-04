<x-mary-errors title="Oops!" description="Please, fix them." icon="o-face-frown" />
<div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-2">
    <x-input label="Codigo" wire:model.blur="form.codigo" />
    <x-datetime-picker label="Fecha de Inicio" parse-format="YYYY-MM-DD" display-format="DD/MM/YYYY"
        wire:model.defer="form.fecha_inicio" />
    <x-datetime-picker label="Fecha de Término" parse-format="YYYY-MM-DD" display-format="DD/MM/YYYY"
        wire:model.defer="form.fecha_fin" />
    <x-select label="Tipo de Capacitación" placeholder="Seleccione una opción" :options="$tipo_capacitaciones"
        option-label="nombre" option-value="id" wire:model.defer="form.tipo_capacitacion_id" />
    <x-select label="Eje Temático" placeholder="Seleccione una opción" :options="$ejes_tematicos" option-label="nombre"
        option-value="id" wire:model.defer="form.eje_tematico_id" />
    <x-select label="Modalidad" placeholder="Seleccione una opción" :options="$modalidades" option-label="nombre"
        option-value="id" wire:model.defer="form.modalidad_id" />
    <x-select label="Oportunidad" placeholder="Seleccione una opción" :options="$oportunidades" option-label="nombre"
        option-value="id" wire:model.defer="form.oportunidad_id" />
    <x-select label="Nivel de Evaluación" placeholder="Seleccione una opción" :options="$niveles" option-label="nombre"
        option-value="id" wire:model.defer="form.oportunidad_id" multiselect />
</div>
<div class="grid  grid-rows-2 grid-flow-col gap-4">
    <x-textarea label="Nombre" wire:model.blur="form.nombre" />
    <x-textarea label="Perfil" wire:model.blur="form.perfil" />
</div>
<div class="grid grid-cols-1 md:grid-cols-2 sm:grid-cols-2 gap-2">
    <x-textarea label="Objetivo de Aprendizaje" wire:model.blur="form.objetivo_aprendizaje" />
    <x-textarea label="Objetivo de Desempeño" wire:model.blur="form.objetivo_desempeño" />
</div>