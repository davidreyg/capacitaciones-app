<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <x-input label="Nombre" wire:model.blur="form.name" />
    <x-select label="Guard" placeholder="Seleccione una opción" :options="['web'=>'web','api'=>'api']"
        wire:model.defer="form.guard_name" />
    <x-input label="Display Name" wire:model.blur="form.display_name" />
    <x-input label="Descripcion" wire:model.blur="form.description" />
</div>