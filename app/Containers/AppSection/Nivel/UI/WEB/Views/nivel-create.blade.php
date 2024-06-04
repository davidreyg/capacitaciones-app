<div>
   <x-mary-header title="Nuevo Nivel de Evaluación" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      @include('appSection@nivel::partials.nivel-form')
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/niveles" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>