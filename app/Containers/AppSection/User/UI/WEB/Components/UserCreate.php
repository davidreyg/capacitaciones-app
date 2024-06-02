<?php

namespace App\Containers\AppSection\User\UI\WEB\Components;

use App\Containers\AppSection\User\UI\WEB\Forms\UserForm;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\User\Models\User;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class UserCreate extends Component
{
    public UserForm $form;
    public $establecimientos;

    public function mount()
    {
        $this->establecimientos = Establecimiento::get()->toArray();
    }
    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Guardado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/users', true);
    }


    public function render()
    {
        return view('appSection@user::user-create');
    }
}