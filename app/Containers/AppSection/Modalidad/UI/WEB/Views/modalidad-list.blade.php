<div>
    <x-mary-header title="Modalidades" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/modalidades/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('modalidad-modalidad-table')
</div>