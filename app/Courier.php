<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    //
    public $timestamps = false;

    protected $fillable=['name', 'cost'];

    function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
