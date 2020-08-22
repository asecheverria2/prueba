<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Planta extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }
    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class);
    }
}
