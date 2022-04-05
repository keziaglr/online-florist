<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    //
    public $timestamps = false;

    protected $fillable=['type_id', 'name', 'price', 'stock', 'type', 'description', 'image'];

    public function flowertype(){
        return $this->hasOne(Flowertype::class, 'id', 'flowertype_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
