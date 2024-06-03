<?php

namespace App\Containers\AppSection\Item\Models;

use App\Containers\AppSection\Respuesta\Models\Respuesta;
use App\Ship\Parents\Models\Model as ParentModel;

class Item extends ParentModel
{
    public $timestamps = false;
    protected $fillable = ['nombre'];
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Item';

    public function respuestas()
    {
        return $this->belongsToMany(Respuesta::class)
            ->withPivot(['valor']);
    }
}
