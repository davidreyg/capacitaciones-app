<div>
    <x-mary-header title="Usuarios" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/users/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('user-user-table')
</div>