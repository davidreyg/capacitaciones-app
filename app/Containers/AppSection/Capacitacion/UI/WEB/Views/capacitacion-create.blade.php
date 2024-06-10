<div>
   <x-mary-header title="Nueva Capacitacion" subtitle="" size="text-xl" separator>
      <x-slot:actions>
         <x-mary-button icon="o-funnel" label="Clonar" wire:click="$toggle('modalClonar')" />
         <x-mary-button icon="tabler.forms" label="Limpiar" wire:click="resetForm" spinner="resetForm" />
      </x-slot:actions>
   </x-mary-header>
   <x-mary-form wire:submit="save">
      @include('appSection@capacitacion::partials.capacitacion-form')
      <x-slot:actions>
         @section('actions')
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/capacitaciones" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="save"
            class="btn-sm btn-primary" />
         @show
      </x-slot:actions>
   </x-mary-form>
   <x-modal wire:model="modalClonar" blur>
      <x-mary-card title="Clonar Capacitación" separator progress-indicator="clonarCapacitacion" class="w-full">
         <livewire:capacitacion-capacitacion-table :custom-actions="true"
            @capacitacionTableSelected="clonarCapacitacion($event.detail.capacitacion)">

      </x-mary-card>
   </x-modal>
</div>