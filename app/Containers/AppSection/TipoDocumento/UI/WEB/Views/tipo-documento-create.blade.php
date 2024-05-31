<div>
   <x-header title="Nuevo Tipo de Documento" subtitle="" size="text-xl" separator>
   </x-header>
   <x-form wire:submit="save">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
         <x-input label="Nombre" wire:model.blur="form.nombre" class="input-sm" first-error-only />
         <x-input label="Dígitos" wire:model.blur="form.digitos" class="input-sm" first-error-only />
      </div>
      <x-slot:actions>
         <x-button label="Cancelar" icon="tabler.circle-x" link="/tipo-documentos" class="btn-sm" />
         <x-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-form>
</div>