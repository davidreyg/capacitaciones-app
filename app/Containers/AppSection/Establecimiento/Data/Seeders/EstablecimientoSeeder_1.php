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
            'nombre' => 'DIRIS SEDE ADMINISTRATIVA',
            'codigo' => 99999999,
            'direccion' => 'Calle Los Pepitos S/N',
            'telefono' => 955927839,
            'ris' => 'LIMA',
            'tipo' => 'DIRIS',
            'parent_id' => null
        ];
        Establecimiento::create($data);
        // Establecimiento::factory(10)->create();
    }
}
