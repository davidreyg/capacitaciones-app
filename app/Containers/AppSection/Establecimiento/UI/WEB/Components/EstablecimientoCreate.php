<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Components;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\Establecimiento\UI\WEB\Forms\EstablecimientoForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Establecimientos')]
class EstablecimientoCreate extends Component
{
    public EstablecimientoForm $form;
    public $allEstablecimientos;
    public $establecimientos;

    public function mount()
    {
        $this->allEstablecimientos = Establecimiento::whereNotIn('tipo', [config('appSection-establecimiento.tipo_establecimiento.ESTABLECIMIENTO')])->get();
    }

    public function updatedFormTipo($value)
    {
        $this->form->reset('parent_id');
        if ($value === config('appSection-establecimiento.tipo_establecimiento.RIS')) {
            $this->establecimientos = $this->allEstablecimientos->filter(function ($establecimiento) {
                return $establecimiento->tipo === config('appSection-establecimiento.tipo_establecimiento.DIRIS');
            });
        }
        if ($value === config('appSection-establecimiento.tipo_establecimiento.ESTABLECIMIENTO')) {
            $this->establecimientos = $this->allEstablecimientos->filter(function ($establecimiento) {
                return $establecimiento->tipo === config('appSection-establecimiento.tipo_establecimiento.RIS');
            });
        }
    }

    public function render()
    {
        return view('appSection@establecimiento::establecimiento-create');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/establecimientos', true);
    }
}