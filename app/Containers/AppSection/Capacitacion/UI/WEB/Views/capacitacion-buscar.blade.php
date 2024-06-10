<div>
    <x-mary-header title="Buscar Capacitaciones" subtitle="Lista de capacitaciones del establecimiento" size="text-xl"
        separator>
    </x-mary-header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <x-mary-card title="Nice things" shadow>
            I am using slots here.

            <x-slot:menu>
                <x-mary-button icon="o-share" class="btn-circle btn-sm" />
                <x-mary-icon name="o-heart" class="cursor-pointer" />
            </x-slot:menu>
            <x-slot:actions>
                <x-mary-button label="Ok" class="btn-primary" />
            </x-slot:actions>
        </x-mary-card>
        <x-mary-card title="Nice things" shadow>
            I am using slots here.
            <x-slot:menu>
                <x-mary-button icon="o-share" class="btn-circle btn-sm" />
                <x-mary-icon name="o-heart" class="cursor-pointer" />
            </x-slot:menu>
            <x-slot:actions>
                <x-mary-button label="Ok" class="btn-primary" />
            </x-slot:actions>
        </x-mary-card>
    </div>
    {{-- @livewire('capacitacion-capacitacion-establecimiento-table') --}}
</div>