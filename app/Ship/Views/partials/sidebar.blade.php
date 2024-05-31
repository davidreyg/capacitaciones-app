<div wire:ignore>
    <x-mary-menu activate-by-route>
        <x-mary-menu-item title="Dashboard" icon="tabler.layout-dashboard" link="/" />
        @forelse ($privilegios as $privilegio)
        <x-mary-menu-sub :icon="$privilegio['icono']" :title="$privilegio['nombre']">
            @foreach ($privilegio['children'] as $children )
            @include('ship::partials.sub_privilegio',['subPrivilegio'=>$children])
            @endforeach
        </x-mary-menu-sub>
        @empty
        @endforelse
    </x-mary-menu>

</div>