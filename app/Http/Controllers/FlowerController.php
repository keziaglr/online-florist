<?php

namespace App\Http\Controllers;

use App\Flower;
use App\Flowertype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlowerController extends Controller
{
    //
    public function showInsertForm()
    {
        $flowertypes = Flowertype::all();
        return view('insert-flower')->with('flowertypes', $flowertypes);
    }

    public function showUpdateForm(Request $request)
    {
        $flower = Flower::find($request->route('id'));
        $flowertypes = Flowertype::all();
        return view('update-flower')->with('flower', $flower)->with('flowertypes', $flowertypes);
    }
    public function showDetail(Request $request)
    {
        $flower = Flower::find($request->route('id'));
        return view('flower-detail')->with('flower', $flower);
    }

    public function index(Request $request){
        $search_query = $request->query('q');
        $flowers = Flower::where('name', "LIKE" , "%$search_query%")->paginate(10)->appends(['q'=> $search_query]);
        return view('catalog')->with('flowers', $flowers);
    }

    public function showManageFlower(Request $request){
        $search_query = $request->query('q');
        $flowers = Flower::where('name', "LIKE" , "%$search_query%")->paginate(10)->appends(['q'=> $search_query]);
        return view('flower')->with('flowers', $flowers);
    }

    public function insert(Request $request)
    {
        $this->validate($request,[
            'flower_name' => 'required|min:3',
            'flower_type' => 'required',
            'flower_price' => 'required|numeric|min:1000',
            'flower_desc' => 'required|min:20|max:200',
            'flower_stock' => 'required|numeric|gt:0',
             'flower_image' => 'mimes:jpeg,png,jpg'
        ]);

        //search flower type id
        $type = Flowertype::where('typename', $request->get('flower_type'))->first();

        $filename = time() . '.' . $request->flower_image->extension();
        $request->flower_image->move(public_path('image'), $filename);

        Flower::insert([
            'type_id' => $type->id,
            'name' => $request->flower_name,
            'price' => $request->flower_price,
            'stock' => $request->flower_stock,
            'description' => $request->flower_desc,
            'image' => $filename
        ]);

        return redirect('home');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'flower_name' => 'required|min:3',
            'flower_type' => 'required',
            'flower_price' => 'required|numeric|min:1000',
            'flower_desc' => 'required|min:20|max:200',
            'flower_stock' => 'required|numeric|gt:0',
             'flower_image' => 'mimes:jpeg,png,jpg'
        ]);

        $flower = Flower::where('id', $request->route('id'))->first();
        $type = Flowertype::where('typename', $request->get('flower_type'))->first();

        $filename = time() . '.' . $request->flower_image->extension();
        $request->flower_image->move(public_path('image'), $filename);

        if($flower->image != null){
            $image_path = "/image/".$flower->image;
            if(Storage::exists($image_path)) {
                Storage::delete($image_path);
            }
        }

        Flower::where('id', $request->route('id'))->update([
            'type_id' => $type->id,
            'name' => $request->flower_name,
            'price' => $request->flower_price,
            'stock' => $request->flower_stock,
            'description' => $request->flower_desc,
            'image' => $filename
        ]);
        return redirect('home');

    }

    public function delete(Request $request){
        Flower::where('id', $request->route('id'))->delete();
        return redirect('home');
    }
}
