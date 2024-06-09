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
            "mary_classes" => "btn-info",
        ],
        "APROBADO" => [
            "nombre" => "APROBADO",
            "wireui_icon" => "document-check",
            "mary_icon" => "tabler.lock-check",
            "mary_classes" => "btn-success",
        ],
        "HABILITADO" => [
            "nombre" => "HABILITADO",
            "wireui_icon" => "document-check",
            "mary_icon" => "tabler.lock-bolt",
            "mary_classes" => "btn-error",
        ],
    ],
];
