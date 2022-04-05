<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $timestamps = false;
    protected $fillable=['user_id', 'flower_id', 'quantity'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function flower(){
        return $this->hasOne(Flower::class, 'id', 'flower_id');
    }
}
