<?php

namespace App\Containers\AppSection\TipoDocumento\UI\WEB\Components;

use App\Containers\AppSection\TipoDocumento\UI\WEB\Forms\TipoDocumentoForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class TipoDocumentoCreate extends Component
{
    public TipoDocumentoForm $form;

    public function render()
    {
        return view('appSection@tipoDocumento::tipo-documento-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/tipo-documentos', true);
    }
}