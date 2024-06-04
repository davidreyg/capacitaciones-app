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
        $sqlFile = base_path('database/data/items.sql');
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            \DB::unprepared($sql);
        }
    }
}
