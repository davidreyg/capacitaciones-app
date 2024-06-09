<div>
   <x-mary-header title="Nueva Capacitacion" subtitle="" size="text-xl" separator>
      <x-slot:actions>
         <x-mary-button icon="o-funnel" label="Clonar" />
      </x-slot:actions>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      @include('appSection@capacitacion::partials.capacitacion-form')
      <x-slot:actions>
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/capacitaciones" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
      </x-slot:actions>
   </x-mary-form>
</div>