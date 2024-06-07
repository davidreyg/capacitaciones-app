<?php

namespace App\Containers\AppSection\Establecimiento\UI\WEB\Components;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\Establecimiento\UI\WEB\Forms\EstablecimientoForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Establecimientos')]
class EstablecimientoEdit extends Component
{
    public EstablecimientoForm $form;
    public $allEstablecimientos;
    public $establecimientos;

    public function mount(Establecimiento $establecimiento)
    {
        $this->form->setEstablecimiento($establecimiento);
        $this->allEstablecimientos = Establecimiento::whereNotIn('tipo', [config('appSection-establecimiento.tipo_establecimiento.ESTABLECIMIENTO')])->get();
        $this->updatedFormTipo($establecimiento->tipo, false);
    }

    public function updatedFormTipo($value, $shouldReset = true)
    {
        if ($shouldReset) {
            $this->form->reset('parent_id');
        }
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
        return view('appSection@establecimiento::establecimiento-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Editado correctamente.')
            ->success()
            ->send();
        return $this->redirect('/establecimientos', true);
    }
}