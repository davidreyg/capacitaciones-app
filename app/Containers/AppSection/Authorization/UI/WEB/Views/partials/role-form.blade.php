<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <x-input label="Nombre" wire:model.blur="form.name" />
    <x-select label="Guard" placeholder="Seleccione una opción" :options="['web'=>'web','api'=>'api']"
        wire:model.defer="form.guard_name" />
    <x-input label="Display Name" wire:model.blur="form.display_name" />
    <x-input label="Descripcion" wire:model.blur="form.description" />



</div>
<div class="mt-5">
    <x-mary-tabs wire:model="selectedTab">
        <x-mary-tab name="privilegios-tab" label="Privilegios" icon="o-users">
            <ul class="menu bg-base-100 rounded-box list-none">
                @foreach ($allPrivilegios as $privilegio)
                <li x-data="{ open: true }">
                    <div @click="open = !open">
                        <x-checkbox :id="'priv'.$privilegio->id" :label="$privilegio->nombre"
                            wire:model.defer="form.privilegio_ids" :value="$privilegio->id" />
                    </div>
                    <ul x-show="open">
                        @foreach ($privilegio->children as $children )
                        @include('appSection@authorization::partials.sub_privilegio',['subPrivilegio'=>$children])
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </x-mary-tab>
        <x-mary-tab name="permisos-tab" label="Permisos" icon="o-sparkles">
            <div>En desarrollo...</div>
        </x-mary-tab>
    </x-mary-tabs>
</div>