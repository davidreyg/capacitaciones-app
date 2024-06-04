<div>
    <x-mary-header title="Niveles de Evaluación" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/niveles/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('nivel-nivel-table')
</div>