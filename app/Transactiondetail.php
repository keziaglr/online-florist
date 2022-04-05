<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactiondetail extends Model
{
    //
    public $timestamps = false;
    protected $fillable=['transaction_id', 'flower_id', 'quantity'];

    function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function flower(){
        return $this->hasOne(Flower::class, 'id', 'flower_id');
    }
}
