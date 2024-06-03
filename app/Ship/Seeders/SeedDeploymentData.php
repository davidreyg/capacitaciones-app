<?php

namespace App\Ship\Seeders;

use App\Ship\Parents\Seeders\Seeder;

class SeedDeploymentData extends Seeder
{
    /**
     * Note: This seeder is not loaded automatically by Apiato
     * This is a special seeder which can be called by "apiato:seed-deploy" command
     * It is useful for seeding data for initial deployment.
     */
    public function run(): void
    {
        /* RESPUESTAS  */
        \DB::table('respuestas')->insert(
            [
                ['nombre' => 'Curso'],
                ['nombre' => 'Taller'],
                ['nombre' => 'Dimoplado'],
                ['nombre' => 'Pasantia'],
                ['nombre' => 'Seminarios'],
            ]
        );
    }
}
