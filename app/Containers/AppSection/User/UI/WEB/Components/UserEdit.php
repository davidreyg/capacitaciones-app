<?php

namespace App\Containers\AppSection\User\UI\WEB\Components;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Traits\UserComputedAttributesTrait;
use App\Containers\AppSection\User\UI\WEB\Forms\UserForm;
use Filament\Notifications\Notification;
use Livewire\Component;

class UserEdit extends Component
{
    use UserComputedAttributesTrait;
    public UserForm $form;
    public $establecimientos;
    public $selectedTab = 'privilegios-tab';

    public function mount(User $user)
    {
        $this->form->setUser($user);
        $this->establecimientos = Establecimiento::get();
    }

    public function update()
    {
        $this->form->update();
        Notification::make()
            ->title('Actualizado Correctamente.')
            ->success()
            ->send();
        return $this->redirect('/users', true);
    }

    public function render()
    {
        return view('appSection@user::user-edit');
    }
}