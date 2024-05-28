@if (array_key_exists('children', $subPrivilegio))
<x-menu-sub title="{{$subPrivilegio['nombre']}}">
    @foreach ($subPrivilegio['children'] as $children )
    @include('ship::partials.sub_privilegio',['subPrivilegio'=>$children])
    @endforeach

</x-menu-sub>
@else
<x-menu-item :link="$subPrivilegio['ruta']">
    <span class="text-wrap">{{$subPrivilegio['nombre']}}</span>
</x-menu-item>
@endif