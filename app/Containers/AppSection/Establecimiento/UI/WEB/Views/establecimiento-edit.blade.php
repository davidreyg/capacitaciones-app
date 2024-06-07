<div>
   <x-mary-header title="Editar {{$form->nombre}}" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="update">
      @include('appSection@establecimiento::partials.establecimiento-form',['is_edit'=>true])
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/establecimientos" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="update"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>