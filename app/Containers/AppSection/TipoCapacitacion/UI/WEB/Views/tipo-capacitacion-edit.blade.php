<div>
   <x-mary-header title="Editar {{$form->nombre}}" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <form wire:submit="update">
      @include('appSection@tipoCapacitacion::partials.tipo-capacitacion-form')

      <div class="pt-6 text-end">
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/tipo-capacitaciones" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="update"
            class="btn-sm btn-primary" />
      </div>
   </form>

</div>