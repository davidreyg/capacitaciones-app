<div>
    <x-mary-header title="Respuestas" subtitle="" size="text-xl" separator>

        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-primary btn-sm" label="Nuevo" link="/respuestas/create" />
        </x-slot:actions>
    </x-mary-header>
    @livewire('respuesta-respuesta-table')
</div>