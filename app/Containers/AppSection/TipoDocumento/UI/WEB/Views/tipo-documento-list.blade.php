<div>
    <x-mary-header title="Tipo de Documentos" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/tipo-documentos/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('tipo-documento-tipo-documento-table')
</div>