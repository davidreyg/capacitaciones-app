<div>
    <x-mary-header title="Capacitaciones" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/capacitaciones/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('capacitacion-capacitacion-table')
</div>