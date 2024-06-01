<div>
   <x-mary-header title="Editar {{$form->nombre}}" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="update">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
         <x-input label="Nombre" wire:model.blur="form.nombre" first-error-only />
         <x-input label="Dígitos" wire:model.blur="form.digitos" first-error-only />
      </div>
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/tipo-documentos" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="update"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>