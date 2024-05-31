<div>
    <x-mary-header title="Establecimientos" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/establecimientos/create" />
        </x-slot:actions>
    </x-mary-header>
    {{-- @livewire('establecimiento-table') --}}
    @livewire('establecimiento-establecimiento-table')
</div>