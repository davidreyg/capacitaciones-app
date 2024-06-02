<div>
    <x-mary-header title="Oportunidades" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/oportunidades/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('oportunidad-oportunidad-table')
</div>