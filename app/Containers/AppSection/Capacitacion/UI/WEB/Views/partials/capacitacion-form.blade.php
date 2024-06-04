<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    {{--
    <x-input label="Nombre" wire:model.blur="form.nombre" /> --}}
    {{--
    <x-select label="Tipo" placeholder="Seleccione una opción" :options="config('appSection-costo.tipos_costo')"
        wire:model.defer="form.tipo" /> --}}
</div>
<x-mary-steps wire:model="step" class="border my-5 p-5 w-full">
    <x-mary-step step="1" text="Datos generales">
        <div>
            <x-input label="Nombre" wire:model.blur="form.nombre" />

        </div>

    </x-mary-step>
    <x-mary-step step="2" text="Payment">
        <div>
            <x-input label="Nombres" wire:value="xdxd" />
        </div>
    </x-mary-step>
    <x-mary-step step="3" text="Receive Product" class="bg-orange-500/20">
        Receive Product
    </x-mary-step>
</x-mary-steps>

{{-- Create some methods to increase/decrease the model to match the step number --}}
{{-- You could use Alpine with `$wire` here --}}
<x-button label="Previous" wire:click="back" />
<x-button label="Next" wire:click="next" />