<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\User\Actions\CreateAdminAction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationDefaultUsersSeeder_4 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateAdminAction $action): void
    {
        // Default Users (with their roles) ---------------------------------------------
        $userData = [
            'establecimiento_id' => 1,
            'password' => 'admin',
            'name' => 'admin',
            'nombre_completo' => 'Gilbert Gil Gutierrez Luyo',
            'cargo' => 'Ingeniero de Sistemas',
        ];

        $action->run($userData);
    }
}
