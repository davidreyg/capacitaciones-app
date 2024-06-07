<x-errors />
<x-card title="Tipo de Establecimiento">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <x-select label="Tipo de establecimiento" placeholder="Seleccione una opción"
            :options="config('appSection-establecimiento.tipo_establecimiento')" wire:model.blur="form.tipo" />
        <x-select label="DIRS / RIS" placeholder="Seleccione una opción" :options="$establecimientos"
            option-label="nombre" option-value="id" wire:model.defer="form.parent_id" @class(['hidden'=> ($form->tipo
            ===
            config('appSection-establecimiento.tipo_establecimiento.DIRIS') || $form->tipo === null)]) />
    </div>
</x-card>
<x-card title="Datos Generales">
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-2">
        <x-input label="Nombre" wire:model.blur="form.nombre" />
        <x-input label="Codigo" wire:model.blur="form.codigo" />
        <x-input label="Direccion" wire:model.blur="form.direccion" />
        <x-input label="Categoria" wire:model.blur="form.categoria" />
        <x-input label="Distrito" wire:model.blur="form.distrito" />
        <x-input label="Correo" wire:model.blur="form.correo" />
        <x-input label="Telefono" wire:model.blur="form.telefono" />
        <x-input label="RIS" wire:model.blur="form.ris" />
    </div>
</x-card>