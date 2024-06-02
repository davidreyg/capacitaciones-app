<?php

return [

    /*
    |---------------------------------------------------------------------------
    | Class Namespaces
    |---------------------------------------------------------------------------
    |
    | This values sets the class namespace for Livewire component classes in
    | your application. This is used to discover the Livewire components.
    |
    */

    'class_namespaces' => [
        'auth' => 'App\\Containers\\AppSection\\Authentication\\UI\\WEB\\Components',
        'ship' => 'App\\Ship\\Components',
        'authorization' => 'App\\Containers\\AppSection\\Authorization\\UI\\WEB\\Components',
        //MODULOS
        'establecimiento' => 'App\\Containers\\AppSection\\Establecimiento\\UI\\WEB\\Components',
        'tipo-documento' => 'App\\Containers\\AppSection\\TipoDocumento\\UI\\WEB\\Components',
        'user' => 'App\\Containers\\AppSection\\User\\UI\\WEB\\Components',
        'modalidad' => 'App\\Containers\\AppSection\\Modalidad\\UI\\WEB\\Components',
        'oportunidad' => 'App\\Containers\\AppSection\\Oportunidad\\UI\\WEB\\Components',
    ],
];
