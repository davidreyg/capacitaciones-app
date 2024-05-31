<?php

namespace App\Containers\AppSection\TipoDocumento\UI\WEB\Components;

use App\Containers\AppSection\TipoDocumento\Models\TipoDocumento;
use App\Containers\AppSection\TipoDocumento\UI\WEB\Forms\TipoDocumentoForm;
use Livewire\Component;

class TipoDocumentoEdit extends Component
{
    public TipoDocumentoForm $form;

    public function mount(TipoDocumento $tipoDocumento)
    {
        $this->form->setTipoDocumento($tipoDocumento);
    }

    public function render()
    {
        return view('appSection@tipoDocumento::tipo-documento-edit');
    }

    public function update()
    {
        $this->form->update();

        return $this->redirect('/tipo-documentos', true);
    }
}