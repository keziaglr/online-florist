<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flowertype extends Model
{
    //
    public $timestamps = false;

    protected $fillable=['typename'];

    function flower(){
        return $this->belongsTo(Flower::class);
    }
}
