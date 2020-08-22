<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tratamiento extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function planta()
    {
        return $this->hasMany(Planta::class);
    }
}
