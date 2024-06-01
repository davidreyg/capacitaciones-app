@if ( $subPrivilegio->children->isNotEmpty())
<x-mary-menu-sub title="{{$subPrivilegio['nombre']}}">
    @foreach ($subPrivilegio['children'] as $children )
    @include('appSection@authorization::partials.sub_privilegio',['subPrivilegio'=>$children])
    @endforeach

</x-mary-menu-sub>
@else
<li>
    <x-checkbox :id="'priv'.$subPrivilegio->id" :label="$subPrivilegio->nombre" wire:model.live="form.privilegio_ids"
        :value="$subPrivilegio->id" />
</li>
@endif