<?php

namespace App\Containers\AppSection\Authorization\Models;

use Apiato\Core\Traits\ModelTrait;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use ModelTrait;

    protected string $guard_name = 'web';

    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
    ];

    public function privilegios()
    {
        return $this->belongsToMany(Privilegio::class);
    }
}
