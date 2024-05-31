<?php

use App\Containers\AppSection\TipoDocumento\UI\WEB\Components\TipoDocumentoEdit;
use Illuminate\Support\Facades\Route;

Route::get('tipo-documentos/{tipoDocumento}/edit', TipoDocumentoEdit::class)
    ->name('tipo-documentos.edit')
    ->middleware(['auth:web']);

