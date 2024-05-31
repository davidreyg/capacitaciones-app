<div>
   <x-mary-header title="Nuevo Tipo de Documento" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
         <x-mary-input label="Nombre" wire:model.blur="form.nombre" class="input-sm" first-error-only />
         <x-mary-input label="Dígitos" wire:model.blur="form.digitos" class="input-sm" first-error-only />
      </div>
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/tipo-documentos" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>