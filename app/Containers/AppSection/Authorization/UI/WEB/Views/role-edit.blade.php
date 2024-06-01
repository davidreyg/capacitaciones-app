<div>
   <x-mary-header title="Editar {{$data['name']}}" subtitle="" size="text-xl" separator>
   </x-mary-header>
   <form wire:submit="update">
      {{ $this->form }}

      <div class="pt-6 text-end">
         <x-mary-button label="Cancelar" icon="tabler.circle-x" link="/roles" class="btn-sm" />
         <x-mary-button label="Guardar" icon="tabler.device-floppy" type="submit" spinner="update"
            class="btn-sm btn-primary" />
      </div>
   </form>

   <x-filament-actions::modals />
</div>