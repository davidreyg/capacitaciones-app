<div>
    <x-menu activate-by-route>
        <x-menu-item title="Dashboard" icon="tabler.layout-dashboard" link="/" />
        @forelse ($privilegios as $privilegio)
        <x-menu-sub :icon="$privilegio['icono']" :title="$privilegio['nombre']">
            @foreach ($privilegio['children'] as $children )
            @include('ship::partials.sub_privilegio',['subPrivilegio'=>$children])
            @endforeach
        </x-menu-sub>
        @empty
        @endforelse
    </x-menu>

</div>