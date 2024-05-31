<?php

use App\Containers\AppSection\TipoDocumento\UI\WEB\Components\TipoDocumentoCreate;
use Illuminate\Support\Facades\Route;

Route::get('tipo-documentos/create', TipoDocumentoCreate::class)
    ->middleware(['auth:web']);

