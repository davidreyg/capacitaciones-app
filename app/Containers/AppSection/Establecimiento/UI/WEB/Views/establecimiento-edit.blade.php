<div>
   <x-mary-header title="Editar {{$form->nombre}}" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="update">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
         <x-input label="Nombre" wire:model.blur="form.nombre" />
         <x-input label="Codigo" wire:model.blur="form.codigo" />
         <x-input label="Direccion" wire:model.blur="form.direccion" />
         <x-input label="Telefono" wire:model.blur="form.telefono" />
         <x-input label="RIS" wire:model.blur="form.ris" />
      </div>
      <x-checkbox id="right-label" label="¿El establecimiento cuenta con laboratorio?"
         wire:model.defer="form.has_lab" />
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/establecimientos" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="update"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>