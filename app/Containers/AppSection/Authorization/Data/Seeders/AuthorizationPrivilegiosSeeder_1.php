<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Models\Privilegio;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationPrivilegiosSeeder_1 extends ParentSeeder
{

    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $modulo1 = Privilegio::create([
            'nombre' => 'Gestionar Capacitaciones',
            'icono' => 'o-academic-cap',

        ]);
        Privilegio::create([
            'nombre' => 'Registrar Capacitacion',
            'icono' => 'fas fa-stethoscope',
            'ruta' => '/triajes/registrar',
            'parent_id' => $modulo1->id,

        ]);
        Privilegio::create([
            'nombre' => 'Buscar Capacitacion',
            'icono' => 'o-magnifying-glass',
            'ruta' => '/diagnosticos/formulario',
            'parent_id' => $modulo1->id,

        ]);
        $modulo2 = Privilegio::create([
            'nombre' => 'Mantenimiento',
            'icono' => 'tabler.settings',
            // 'ruta' => '',
            // 'ruta' => '',

        ]);

        Privilegio::create([
            'nombre' => 'Establecimientos',
            'icono' => 'fas fa-city',
            'ruta' => '/establecimientos',
            'parent_id' => $modulo2->id,

        ]);

        Privilegio::create([
            'nombre' => 'Tipo de Documento',
            'icono' => 'fas fa-address-card',
            'ruta' => '/tipo-documentos',
            'parent_id' => $modulo2->id,

        ]);

        Privilegio::create([
            'nombre' => 'Personal Administrativo',
            'icono' => 'fas fa-people-group',
            'ruta' => '/empleados',
            'parent_id' => $modulo2->id,

        ]);

        Privilegio::create([
            'nombre' => 'Roles',
            'icono' => 'fas fa-shield-halved',
            'ruta' => '/roles',
            'parent_id' => $modulo2->id,

        ]);
        Privilegio::create([
            'nombre' => 'Usuarios',
            'icono' => 'fas fa-user-gear',
            'ruta' => '/users',
            'parent_id' => $modulo2->id,

        ]);
        $xd = Privilegio::create([
            'nombre' => 'Respuestas',
            'icono' => 'fas fa-question',
            'ruta' => '/respuestas',
            'parent_id' => $modulo2->id,

        ]);
        $xsd = Privilegio::create([
            'nombre' => 'Testing',
            'icono' => 'fas fa-question',
            'ruta' => '/testing',
            'parent_id' => $xd->id,

        ]);
        Privilegio::create([
            'nombre' => 'fsdfs',
            'icono' => 'fas fa-question',
            'ruta' => '/sdfsdf',
            'parent_id' => $xsd->id,

        ]);
    }
}
