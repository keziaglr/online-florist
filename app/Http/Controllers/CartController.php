<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Courier;
use App\Flower;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(){
        $carts = auth()->user()->cart;
        $couriers = Courier::all();
        $total = 0;
        foreach ($carts as $cart){
            $total += $cart->quantity * $cart->flower->price;
        }
        return view('cart')->with('carts', $carts)->with('couriers', $couriers)->with('total', $total);
    }

    public function delete(Request $request){
        Cart::where('flower_id', $request->route('id'))->delete();
        return redirect('cart');
    }

    public function addToCart(Request $request){
        $this->validate($request,[
            'quantity' => 'gt:0',
        ]);

        $flower = Flower::find($request->route('id'));

        if(auth()->user()->cart->where('flower_id', '=', $flower->id)->first() == NULL){
            Cart::create([
                'user_id' => auth()->user()->id,
                'flower_id' => $flower->id,
                'quantity' => 1
            ]);
        }else{
            $cart = auth()->user()->cart->where('flower_id', '=', $flower->id)->first();
            $qty = $cart->quantity + $request->quantity;
            Cart::where('flower_id', $flower->id)->update([
                'user_id' => auth()->user()->id,
                'flower_id' => $flower->id,
                'quantity' => $qty
            ]);
        }

        return redirect()->back();
    }

    public function order(Request $request){
        $flower = Flower::find($request->route('id'));

        if(auth()->user()->cart->where('flower_id', '=', $flower->id)->first() == NULL){
            Cart::create([
                'user_id' => auth()->user()->id,
                'flower_id' => $flower->id,
                'quantity' => 1
            ]);
        }else{
            $cart = auth()->user()->cart->where('flower_id', '=', $flower->id)->first();
            $qty = $cart->quantity + 1;
            Cart::where('flower_id', $flower->id)->update([
                'user_id' => auth()->user()->id,
                'flower_id' => $flower->id,
                'quantity' => $qty
            ]);
        }
        return redirect()->back();
    }
}
