<div>
    <x-mary-header title="Items" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/items/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('item-item-table')
</div>