<?php

namespace App\Containers\AppSection\Item\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Item extends ParentModel
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'descripcion'];
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Item';
}
