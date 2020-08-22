<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Vivero extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }
}
