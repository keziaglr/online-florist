<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use App\Transactiondetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function checkout(Request $request){
        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'courier_id' => $request->courier,
            'transaction_date' => now()
        ]);

//        $transaction = Transaction::where('transaction_date', '=', now())->first();
        $carts = auth()->user()->cart;
        foreach ($carts as $cart){
            Transactiondetail::create([
                'transaction_id' => $transaction->id,
                'flower_id' => $cart->flower->id,
                'quantity' => $cart->quantity
            ]);
        }

        Cart::where('user_id', auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function index(){
        $transactions = Transaction::all();
        return view('transaction-history')->with('transactions', $transactions);
    }
}
