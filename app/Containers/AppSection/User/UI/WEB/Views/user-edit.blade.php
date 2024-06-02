<div>
   <x-mary-header title="Editar {{$form->name}}" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <form wire:submit="update">
      @include('appSection@user::partials.user-form')

      <div class="pt-6 text-end">
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/users" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="update"
            class="btn-sm btn-primary" />
      </div>
   </form>

</div>