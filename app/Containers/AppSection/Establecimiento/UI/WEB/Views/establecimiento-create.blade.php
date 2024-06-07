<div>
   <x-mary-header title="Nuevo Establecimiento" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      @include('appSection@establecimiento::partials.establecimiento-form',['is_edit'=>false])
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/establecimientos" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>