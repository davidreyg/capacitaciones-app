<div>
    <x-mary-header title="Costos" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/costos/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('costo-costo-table')
</div>