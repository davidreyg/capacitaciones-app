<?php

namespace App\Containers\AppSection\Establecimiento\Data\Seeders;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class EstablecimientoSeeder_1 extends ParentSeeder
{

    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $data = [
            'nombre' => 'Establecmiento1',
            'codigo' => 123456,
            'direccion' => 'Calle Los Pepitos S/N',
            'telefono' => 955927839,
            'ris' => 'LIMA',
            'has_lab' => true,
        ];
        Establecimiento::create($data);
        Establecimiento::factory(10)->create();
    }
}
