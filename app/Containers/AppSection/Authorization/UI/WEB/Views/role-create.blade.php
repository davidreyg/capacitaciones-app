<div>
   <x-mary-header title="Nuevo Rol" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      @include('appSection@authorization::partials.role-form')
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/roles" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>