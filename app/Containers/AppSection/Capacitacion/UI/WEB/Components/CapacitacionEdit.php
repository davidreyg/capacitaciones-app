<?php

namespace App\Containers\AppSection\Capacitacion\UI\WEB\Components;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\Capacitacion\UI\WEB\Forms\CapacitacionForm;
use App\Containers\AppSection\EjeTematico\Models\EjeTematico;
use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Modalidad\Models\Modalidad;
use App\Containers\AppSection\Nivel\Models\Nivel;
use App\Containers\AppSection\Oportunidad\Models\Oportunidad;
use App\Containers\AppSection\TipoCapacitacion\Models\TipoCapacitacion;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Capacitaciones')]
class CapacitacionEdit extends Component
{
    public CapacitacionForm $form;
    public $tipo_capacitaciones;
    public $ejes_tematicos;
    public $oportunidades;
    public $modalidades;
    public $niveles;
    public $items;
    public $selected_tab;

    public function mount(Capacitacion $capacitacion)
    {
        $this->selected_tab = 'datos-generales';
        $this->form->setCapacitacion($capacitacion);
        $this->tipo_capacitaciones = TipoCapacitacion::get();
        $this->ejes_tematicos = EjeTematico::get();
        $this->oportunidades = Oportunidad::get();
        $this->modalidades = Modalidad::get();
        $this->niveles = Nivel::get();
        $this->items = Item::with('respuestas')->get();
    }

    public function render()
    {
        return view('appSection@capacitacion::capacitacion-edit');
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/capacitaciones', true);
    }
}