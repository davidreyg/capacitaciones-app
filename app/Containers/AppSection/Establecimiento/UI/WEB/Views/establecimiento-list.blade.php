<div>
    <x-header title="Establecimientos" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/establecimientos/create" />
        </x-slot:actions>
    </x-header>
    @livewire('establecimiento-table')
</div>