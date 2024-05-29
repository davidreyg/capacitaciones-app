<div>
   <x-header title="Editar {{$form->nombre}}" subtitle="" size="text-xl" separator>

      <x-slot:actions>
         <x-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/establecimientos/create" />
      </x-slot:actions>
   </x-header>
   <x-form wire:submit="update">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
         <x-input label="Nombre" wire:model="form.nombre" class="input-sm" first-error-only />
         <x-input label="Codigo" wire:model="form.codigo" class="input-sm" first-error-only />
         <x-input label="Direccion" wire:model="form.direccion" class="input-sm" first-error-only />
         <x-input label="Telefono" wire:model="form.telefono" class="input-sm" first-error-only />
         <x-input label="RIS" wire:model="form.ris" class="input-sm" first-error-only />
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
         <x-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="update"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-form>
</div>