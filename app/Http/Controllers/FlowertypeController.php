<?php

namespace App\Http\Controllers;

use App\Flowertype;
use Illuminate\Http\Request;

class FlowertypeController extends Controller
{
    //
    public function showInsertForm()
    {
        return view('insert-flowertype');
    }

    public function showUpdateForm(Request $request)
    {
        $flowertype = Flowertype::find($request->route('id'));
        return view('update-flowertype')->with('flowertype',$flowertype);
    }

    public function index(Request $request)
    {
        $search_query = $request->query('q');
        $flowertypes = Flowertype::where('typename', "LIKE" , "%$search_query%")->paginate()->appends(['q'=> $search_query]);
        return view('flower-type')->with('flowertypes', $flowertypes);
    }

    public function insert(Request $request){

        $this->validate($request,[
            'typename' => 'required|unique:App\Flowertype|min:4'
        ]);

        Flowertype::insert([
            'typename' => $request->typename
        ]);

        return redirect('flower/type');
    }

    public function update(Request $request){
        $this->validate($request,[
            'typename' => 'required|unique:App\Flowertype|min:4'
        ]);

        Flowertype::where('id', $request->route('id'))->update([
            'typename' => $request->typename
        ]);

        return redirect('flower/type');
    }

    public function delete(Request $request){
        Flowertype::where('id', $request->route('id'))->delete();
        return redirect('flower/type');
    }
}
