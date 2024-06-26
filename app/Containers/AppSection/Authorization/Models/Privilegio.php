<?php

namespace App\Containers\AppSection\Authorization\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Privilegio extends ParentModel
{
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion',
        'icono',
        'ruta',
        'parent_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Privilegio';
}
