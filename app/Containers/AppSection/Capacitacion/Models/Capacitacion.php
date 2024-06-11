<?php

namespace App\Containers\AppSection\Capacitacion\Models;

use App\Containers\AppSection\Costo\Models\Costo;
use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\Item\Models\Item;
use App\Containers\AppSection\Modalidad\Models\Modalidad;
use App\Containers\AppSection\Nivel\Models\Nivel;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Jenssegers\Date\Date;

class Capacitacion extends ParentModel
{
    protected $fillable = [
        'nombre',
        'codigo',
        'fecha_inicio',
        'fecha_fin',
        'perfil',
        'objetivo_aprendizaje',
        'objetivo_desempeño',
        'creditos',
        'numero_horas',
        'problema',
        'tipo_capacitacion_id',
        'eje_tematico_id',
        'modalidad_id',
        'oportunidad_id',
        'is_libre',
        'vacantes',
        'estado',
    ];

    protected $casts = [
        'is_libre' => 'boolean',
    ];

    public function getFechaInicioFormatAttribute()
    {
        return (new Date($this->fecha_inicio))->format('j \de F Y');
    }

    public function getFechaFinFormatAttribute()
    {
        return (new Date($this->fecha_fin))->format('j \de F Y');
    }
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Capacitacion';

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class);
    }

    public function nivels()
    {
        return $this->belongsToMany(Nivel::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot(['respuesta_id']);
    }

    public function costos()
    {
        return $this->belongsToMany(Costo::class)
            ->withPivot(['valor']);
    }

    public function establecimientos()
    {
        return $this->belongsToMany(Establecimiento::class)
            ->withPivot(['estado']);
    }
}
