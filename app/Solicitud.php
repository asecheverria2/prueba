<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Solicitud extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function vivero()
    {
        return $this->belongsTo(Vivero::class);
    }
    public function planta()
    {
        return $this->belongsTo(Planta::class);
    }
}
