<div>
    <x-mary-header title="Tipos de Capacitación" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/tipo-capacitaciones/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('tipo-capacitacion-tipo-capacitacion-table')
</div>