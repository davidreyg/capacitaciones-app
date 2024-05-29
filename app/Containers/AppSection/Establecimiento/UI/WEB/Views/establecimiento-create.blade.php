<div>
   <x-header title="Nuevo Establecimiento" subtitle="" size="text-xl" separator>
   </x-header>
   <x-form wire:submit="save">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
         <x-input label="Nombre" wire:model.blur="form.nombre" class="input-sm" first-error-only />
         <x-input label="Codigo" wire:model.blur="form.codigo" class="input-sm" first-error-only />
         <x-input label="Direccion" wire:model.blur="form.direccion" class="input-sm" first-error-only />
         <x-input label="Telefono" wire:model.blur="form.telefono" class="input-sm" first-error-only />
         <x-input label="RIS" wire:model.blur="form.ris" class="input-sm" first-error-only />
      </div>
      <x-checkbox wire:model.blur="form.has_lab" class="checkbox-sm" first-error-only>
         <x-slot:label>
            <span class="label label-text font-semibold">
               ¿El establecimiento cuenta con laboratorio?
            </span>
         </x-slot:label>
      </x-checkbox>

      <x-slot:actions>
         <x-button label="Cancelar" icon="tabler.circle-x" link="/establecimientos" class="btn-sm" />
         <x-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-form>
</div>