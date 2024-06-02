<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Facades\DB;

class AuthorizationPrivilegiosSeeder_1 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        // Load the privileges array from the config file
        $privilegios = config('privilegios');

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Insert the privileges
            $this->insertPrivilegios($privilegios);

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            throw new CreateResourceFailedException($e->getMessage());
        }
    }

    /**
     * Insert privileges recursively.
     *
     * @param array $privilegios
     * @param int|null $parentId
     */
    private function insertPrivilegios(array $privilegios, int $parentId = null): void
    {
        foreach ($privilegios as $privilegio) {
            // Get the full route using the helper
            $fullRoute = privilegio_route($privilegio['nombre']);
            // Insert the privilege and get its ID
            $newPrivilegio = DB::table('privilegios')->insertGetId([
                'nombre' => $privilegio['nombre'],
                'icono' => $privilegio['icono'],
                'ruta' => $fullRoute,
                'slug' => $privilegio['slug'],
                'parent_id' => $parentId,
            ]);

            // Check if there are sub-privileges to insert
            if (isset($privilegio['children']) && is_array($privilegio['children'])) {
                // Insert sub-privileges recursively with the new parent ID
                $this->insertPrivilegios($privilegio['children'], $newPrivilegio);
            }
        }
    }
}