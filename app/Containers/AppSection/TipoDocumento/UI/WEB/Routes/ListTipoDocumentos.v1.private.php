<?php

use App\Containers\AppSection\TipoDocumento\UI\WEB\Components\TipoDocumentoList;
use Illuminate\Support\Facades\Route;

Route::get('tipo-documentos', TipoDocumentoList::class)
    ->middleware(['auth:web']);

