<div>
   <x-mary-header title="Nuevo Establecimiento" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
         <x-mary-input label="Nombre" wire:model.blur="form.nombre" class="input-sm" first-error-only />
         <x-mary-input label="Codigo" wire:model.blur="form.codigo" class="input-sm" first-error-only />
         <x-mary-input label="Direccion" wire:model.blur="form.direccion" class="input-sm" first-error-only />
         <x-mary-input label="Telefono" wire:model.blur="form.telefono" class="input-sm" first-error-only />
         <x-mary-input label="RIS" wire:model.blur="form.ris" class="input-sm" first-error-only />
      </div>
      <x-mary-checkbox wire:model.blur="form.has_lab" class="checkbox-sm" first-error-only>
         <x-slot:label>
            <span class="label label-text font-semibold">
               ¿El establecimiento cuenta con laboratorio?
            </span>
         </x-slot:label>
      </x-mary-checkbox>

      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/establecimientos" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>