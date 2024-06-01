<div>
   <x-mary-header title="Nuevo Rol" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
         <x-input label="Nombre" wire:model.blur="form.name" />
         <x-input label="Dígitos" wire:model.blur="form.guard_name" />
         <x-input label="Dígitos" wire:model.blur="form.display_name" />
         <x-input label="Dígitos" wire:model.blur="form.description" />
      </div> --}}
      @include('appSection@authorization::partials.role-form')
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/roles" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>