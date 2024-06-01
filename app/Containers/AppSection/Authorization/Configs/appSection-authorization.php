<?php

return [
    /*
    |--------------------------------------------------------------------------
    | AppSection Section Authorization Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Admin Role
    |--------------------------------------------------------------------------
    |
    | This role is used across the app as the main authority e.g. super admin role
    |
    */

    'admin_role' => env('ADMIN_ROLE', 'admin'),

    'permission_prefixes' => [
        'view' => 'Ver ',
        'view_any' => 'Ver cualquier ',
        'create' => 'Crear ',
        'update' => 'Modificar ',
        'restore' => 'Restaurar ',
        'restore_any' => 'Restaurar cualquier ',
        'replicate' => 'Replicar ',
        'reorder' => 'Reordenar ',
        'delete' => 'Eliminar ',
        'delete_any' => 'Eliminar cualquier ',
        'force_delete' => 'Forzar eliminacion ',
        'force_delete_any' => 'Forzar eliminacion de cualquier ',
        'lock' => 'Bloquear ',
    ]
];
