<div>
    <x-mary-header title="Roles" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/roles/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('authorization-role-table')
</div>