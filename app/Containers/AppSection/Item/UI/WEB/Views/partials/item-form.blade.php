<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <x-input label="Nombre" wire:model.blur="form.nombre" />
    <div class="join flex items-end">
        <x-select label="Respuesta" placeholder="Seleccione una opción" :options="$respuestas" option-label="nombre"
            option-value="id" wire:model.defer="respuesta_id" />
        <x-button squared primary label="Agregar" class="h-9 join-item rounded-r-full" wire:click="addRespuesta" />
    </div>
</div>
<h4 class="mt-5">Respuestas Seleccionadas:</h4>

<div class="overflow-x-auto">
    <table class="table table-auto align-middle table-xs">
        <tbody>
            @foreach($form->item_respuesta as $index => $selectedRespuesta)
            <tr>
                <th>
                    <x-input label="Respuesta" :value="$selectedRespuesta['respuesta_nombre']" readonly disabled />
                </th>
                <td>
                    <x-input label="Valor" wire:model.blur="form.item_respuesta.{{$index}}.valor" />

                </td>
                <td>
                    <x-mary-button wire:click="removeRespuesta({{ $index }})" class="btn-sm btn-circle btn-error"
                        icon="o-trash" />

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>