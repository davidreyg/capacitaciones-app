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
        $items = base_path('database/data/items.sql');
        $tipo_capacitaciones = base_path('database/data/tipos_capacitacion.sql');
        $ejes_tematicos = base_path('database/data/ejes_tematicos.sql');
        $modalidades = base_path('database/data/modalidades.sql');
        $oportunidades = base_path('database/data/oportunidades.sql');
        $niveles = base_path('database/data/niveles.sql');
        $costos = base_path('database/data/costos.sql');

        if (file_exists($items)) {
            $sql = file_get_contents($items);
            \DB::unprepared($sql);
        }
        if (file_exists($tipo_capacitaciones)) {
            $sql = file_get_contents($tipo_capacitaciones);
            \DB::unprepared($sql);
        }
        if (file_exists($ejes_tematicos)) {
            $sql = file_get_contents($ejes_tematicos);
            \DB::unprepared($sql);
        }
        if (file_exists($modalidades)) {
            $sql = file_get_contents($modalidades);
            \DB::unprepared($sql);
        }
        if (file_exists($oportunidades)) {
            $sql = file_get_contents($oportunidades);
            \DB::unprepared($sql);
        }
        if (file_exists($niveles)) {
            $sql = file_get_contents($niveles);
            \DB::unprepared($sql);
        }
        if (file_exists($costos)) {
            $sql = file_get_contents($costos);
            \DB::unprepared($sql);
        }
    }
}
