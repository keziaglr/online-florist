<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public $timestamps = false;
    protected $fillable=['user_id', 'courier_id', 'transaction_date'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

    public function detail(){
        return $this->hasMany(Transactiondetail::class);
    }
}
