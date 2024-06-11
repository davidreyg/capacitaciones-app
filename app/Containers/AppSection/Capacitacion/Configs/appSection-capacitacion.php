<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AppSection Section Capacitacion Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    "estado_establecimiento" => [
        "SOLICITADO" => [
            "nombre" => "SOLICITADO",
            "wireui_icon" => "clipboard-document-list",
            "mary_icon" => "tabler.lock",
            "filament_icon" => "heroicon-o-lock",
            "mary_classes" => "btn-info",
        ],
        "APROBADO" => [
            "nombre" => "APROBADO",
            "wireui_icon" => "document-check",
            "mary_icon" => "tabler.lock-check",
            "filament_icon" => "heroicon-o-lock-open",
            "mary_classes" => "btn-success",
        ],
        "HABILITADO" => [
            "nombre" => "HABILITADO",
            "wireui_icon" => "document-check",
            "mary_icon" => "tabler.lock-bolt",
            "filament_icon" => "heroicon-o-check-circle",
            "mary_classes" => "btn-error",
        ],
    ],

    "estado" => [
        "C" => [
            "nombre" => "Registrado",
            "slug" => "C",
            "wireui_icon" => "clipboard-document-list",
            "mary_icon" => "tabler.lock",
            "filament_icon" => "heroicon-o-lock",
            "mary_classes" => "btn-info",
        ],
        "E" => [
            "nombre" => "En curso",
            "slug" => "E",
            "wireui_icon" => "document-check",
            "mary_icon" => "tabler.lock-check",
            "filament_icon" => "heroicon-o-lock-open",
            "mary_classes" => "btn-success",
        ],
        "F" => [
            "nombre" => "Finalizado",
            "slug" => "F",
            "wireui_icon" => "document-check",
            "mary_icon" => "tabler.lock-bolt",
            "filament_icon" => "heroicon-o-check-circle",
            "mary_classes" => "btn-error",
        ],
    ],
];
