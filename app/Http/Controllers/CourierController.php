<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    //
    public function showInsertForm()
    {
        return view('insert-courier');
    }

    public function showUpdateForm(Request $request)
    {
        $courier = Courier::find($request->route('id'));
        return view('update-courier')->with('courier',$courier);
    }

    public function index(Request $request)
    {
        $search_query = $request->query('q');
        $couriers = Courier::where('name', "LIKE" , "%$search_query%")->paginate()->appends(['q'=> $search_query]);
        return view('courier')->with('couriers', $couriers);
    }

    public function insert(Request $request){

        $this->validate($request,[
            'courier_name' => 'required|min:3',
            'shipping_cost' => 'required|numeric|gt:3000'
        ]);

        Courier::insert([
            'name' => $request->courier_name,
            'cost' => $request->shipping_cost
        ]);

        return redirect('courier');
    }

    public function update(Request $request){
        $this->validate($request,[
            'courier_name' => 'required|min:3',
            'shipping_cost' => 'required|numeric|gt:3000'
        ]);

        Courier::where('id', $request->route('id'))->update([
            'name' => $request->courier_name,
            'cost' => $request->shipping_cost
        ]);

        return redirect('courier');
    }

    public function delete(Request $request){
        Courier::where('id', $request->route('id'))->delete();
        return redirect('courier');
    }
}
