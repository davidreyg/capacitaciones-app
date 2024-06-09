<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <x-input label="Nombre" wire:model.blur="form.name" />
    <x-select label="Establecimiento" placeholder="Seleccione una opción" :options="$establecimientos"
        option-label="nombre" option-value="id" wire:model.defer="form.establecimiento_id" />
    <x-input label="Nombre Completo" wire:model.blur="form.nombre_completo" />
    <x-input label="Cargo" wire:model.blur="form.cargo" />
    <x-inputs.password label="Passowrd" wire:model.blur="form.password" />
    <x-select label="Roles" placeholder="Seleccione una opción" :options="$this->roles" option-label="name"
        option-value="id" wire:model.blur="form.role_ids" multiselect />
</div>