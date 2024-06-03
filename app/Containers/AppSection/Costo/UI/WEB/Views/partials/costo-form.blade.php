<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <x-input label="Nombre" wire:model.blur="form.nombre" />
    <x-select label="Tipo" placeholder="Seleccione una opción" :options="config('appSection-costo.tipos_costo')"
        wire:model.defer="form.tipo" />
</div>