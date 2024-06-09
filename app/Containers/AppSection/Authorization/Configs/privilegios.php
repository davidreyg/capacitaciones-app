<?php
return [
    [
        'nombre' => 'Gestionar Capacitaciones',
        'icono' => 'o-academic-cap',
        'ruta' => '/gestionar',
        'slug' => 'gestionar',
        'children' => [
            [
                'nombre' => 'Registrar Capacitacion',
                'icono' => 'fas fa-stethoscope',
                'ruta' => '/registrar-capacitacion',
                'slug' => 'registrar-capacitacion',
            ],
            [
                'nombre' => 'Habilitar Capacitaciones',
                'icono' => 'fas fa-stethoscope',
                'ruta' => '/habilitar-capacitaciones',
                'slug' => 'habilitar-capacitaciones',
            ],
            [
                'nombre' => 'Buscar Capacitacion',
                'icono' => 'o-magnifying-glass',
                'ruta' => '/diagnosticos/formulario',
                'slug' => 'formulario',
            ],
        ],
    ],
    [
        'nombre' => 'Mantenimiento',
        'icono' => 'tabler.settings',
        'ruta' => '/mantenimiento',
        'slug' => 'mantenimiento',
        'children' => [
            [
                'nombre' => 'Capacitaciones',
                'icono' => 'fas fa-city',
                'ruta' => '/capacitaciones',
                'slug' => 'capacitaciones',
            ],
            [
                'nombre' => 'Establecimientos',
                'icono' => 'fas fa-city',
                'ruta' => '/establecimientos',
                'slug' => 'establecimientos',
            ],
            [
                'nombre' => 'Tipo de Documento',
                'icono' => 'fas fa-address-card',
                'ruta' => '/tipo-documentos',
                'slug' => 'tipo-documentos',
            ],
            [
                'nombre' => 'Personal Administrativo',
                'icono' => 'fas fa-people-group',
                'ruta' => '/empleados',
                'slug' => 'empleados',
            ],
            [
                'nombre' => 'Roles',
                'icono' => 'fas fa-shield-halved',
                'ruta' => '/roles',
                'slug' => 'roles',
            ],
            [
                'nombre' => 'Usuarios',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/users',
                'slug' => 'users',
            ],
            [
                'nombre' => 'Modalidad',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/modalidades',
                'slug' => 'modalidades',
            ],
            [
                'nombre' => 'Oportunidades',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/oportunidades',
                'slug' => 'oportunidades',
            ],
            [
                'nombre' => 'Tipo de Capacitaciones',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/tipo-capacitaciones',
                'slug' => 'tipo-capacitaciones',
            ],
            [
                'nombre' => 'Ejes Temáticos',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/ejes-tematicos',
                'slug' => 'ejes-tematicos',
            ],
            [
                'nombre' => 'Items',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/items',
                'slug' => 'items',
            ],
            [
                'nombre' => 'Costos',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/costos',
                'slug' => 'costos',
            ],
            [
                'nombre' => 'Niveles de Evaluación',
                'icono' => 'fas fa-user-gear',
                'ruta' => '/niveles',
                'slug' => 'niveles',
            ],
            [
                'nombre' => 'Respuestas',
                'icono' => 'fas fa-question',
                'ruta' => '/respuestas',
                'slug' => 'respuestas',
                // 'children' => [
                //     [
                //         'nombre' => 'Testing',
                //         'icono' => 'fas fa-question',
                //         'ruta' => '/testing',
                //         'slug' => 'testing',
                //         'children' => [
                //             [
                //                 'nombre' => 'fsdfs',
                //                 'icono' => 'fas fa-question',
                //                 'ruta' => '/sdfsdf',
                //                 'slug' => 'sdfsdf',
                //             ],
                //         ],
                //     ],
                // ],
            ],
        ],
    ],
];
