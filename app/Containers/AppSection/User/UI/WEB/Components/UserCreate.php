<?php

namespace App\Containers\AppSection\User\UI\WEB\Components;

use App\Containers\AppSection\User\Traits\UserComputedAttributesTrait;
use App\Containers\AppSection\User\UI\WEB\Forms\UserForm;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use Filament\Notifications\Notification;
use Livewire\Component;

class UserCreate extends Component
{
    use UserComputedAttributesTrait;
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