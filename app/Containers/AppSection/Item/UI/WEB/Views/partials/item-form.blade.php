<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <x-input label="Nombre" wire:model.blur="form.nombre" />
    <x-textarea label="Descripción" wire:model.blur="form.descripcion" placeholder="Ingrese una descripción" />
</div>