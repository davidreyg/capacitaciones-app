<?php
return [
    [
        'nombre' => 'Gestionar Capacitaciones',
        'icono' => 'o-academic-cap',
        'children' => [
            [
                'nombre' => 'Registrar Capacitacion',
                'icono' => 'fas fa-stethoscope',
                'ruta' => '/triajes/registrar',
            ],
            [
                'nombre' => 'Buscar Capacitacion',
                'icono' => 'o-magnifying-glass',
                'ruta' => '/diagnosticos/formulario',
            ],
        ],
    ],
    [
        'nombre' => 'Mantenimiento',
        'icono' => 'tabler.settings',
        'children' => [
            [
                'nombre' => 'Establecimientos',
                'icono' => 'fas fa-city',
                'ruta' => '/establecimientos',
            ],
            [
                'nombre' => 'Tipo de Documento',
                'icono' => 'fas fa-address-card',
                'ruta' => '/tipo-documentos',
            ],
            [
                'nombre' => 'Personal Administrativo',
                'icono' => 'fas fa-people-group',
                'ruta' => '/empleados',
            ],
            [
                'nombre' => 'Roles',
                'icono' => 'fas fa-shield-halved',
                'ruta' => '/roles',
            ],
            [
                'nombre' => 'Usuarios',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/users',
            ],
            [
                'nombre' => 'Modalidad',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/modalidades',
            ],
            [
                'nombre' => 'Respuestas',
                'icono' => 'fas fa-question',
                'ruta' => '/respuestas',
                'children' => [
                    [
                        'nombre' => 'Testing',
                        'icono' => 'fas fa-question',
                        'ruta' => '/testing',
                        'children' => [
                            [
                                'nombre' => 'fsdfs',
                                'icono' => 'fas fa-question',
                                'ruta' => '/sdfsdf',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
