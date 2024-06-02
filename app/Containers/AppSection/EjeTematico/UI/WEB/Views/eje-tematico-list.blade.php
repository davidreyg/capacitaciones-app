<div>
    <x-mary-header title="Ejes Tematicos" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/ejes-tematicos/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('eje-tematico-eje-tematico-table')
</div>