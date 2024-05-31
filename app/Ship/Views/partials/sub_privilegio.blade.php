@if (array_key_exists('children', $subPrivilegio))
<x-mary-menu-sub title="{{$subPrivilegio['nombre']}}">
    @foreach ($subPrivilegio['children'] as $children )
    @include('ship::partials.sub_privilegio',['subPrivilegio'=>$children])
    @endforeach

</x-mary-menu-sub>
@else
<x-mary-menu-item :link="$subPrivilegio['ruta']">
    <span class="text-wrap">{{$subPrivilegio['nombre']}}</span>
</x-mary-menu-item>
@endif