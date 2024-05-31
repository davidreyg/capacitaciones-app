<?php

namespace App\Containers\AppSection\TipoDocumento\UI\WEB\Forms;

use App\Containers\AppSection\TipoDocumento\Models\TipoDocumento;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TipoDocumentoForm extends Form
{
    public ?TipoDocumento $tipoDocumento;

    #[Validate]
    public $nombre;

    #[Validate]
    public $digitos;

    public function setTipoDocumento(?TipoDocumento $tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
        $this->nombre = $tipoDocumento->nombre;
        $this->digitos = $tipoDocumento->digitos;
    }

    public function rules()
    {
        $rules = [
            'nombre' => [
                'required',
                'max:50',
            ],
            'digitos' => [
                'required',
                'numeric',
                'integer',
                'gt:0',
                'max:99',
            ],
        ];
        return $rules;
    }

    public function store()
    {
        $this->validate();
        TipoDocumento::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->tipoDocumento->update($this->all());

        $this->reset();
    }
}