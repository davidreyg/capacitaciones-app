<?php

namespace App\Containers\AppSection\Establecimiento\Models;

use App\Containers\AppSection\Capacitacion\Models\Capacitacion;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;

class Establecimiento extends ParentModel
{
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'codigo',
        'direccion',
        'categoria',
        'telefono',
        'ris',
        'tipo',
        'distrito',
        'correo',
        'parent_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'has_lab' => 'boolean'
    ];

    protected string $resourceKey = 'Establecimiento';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function capacitaciones()
    {
        return $this->belongsToMany(Capacitacion::class)
            ->withPivot(['estado']);
    }
}
