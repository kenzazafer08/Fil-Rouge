<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(['products' => Product::with('pcategorie', 'pet')->get()]);
    }

    public function price(String $id)
    {
        if($id == 1){
            return response(['products' => Product::with('pcategorie', 'pet')->orderBy('price','asc')->get()]);
        }else if($id == 2){
            return response(['products' => Product::with('pcategorie', 'pet')->orderBy('price','desc')->get()]);
        }
    }

    public function random(){
        return response(['products' => Product::with('pcategorie', 'pet')->inRandomOrder()->Limit(6)->get()]);
    }
    public function stock(){
        return response(['products' => Product::with('pcategorie', 'pet')->orderBy('stock', 'asc')->get()]);
    }
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image;
        if (!$image) {
            return response()->json(['error' => 'No image provided'], 400);
        }
        try {
            $image->move(public_path('uploads'),$image->getClientOriginalName());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to upload image'], 500);
        }
        $categorie = product::create([
            'name' => $request->name,
            'discription' => $request->discription,
            'image' => $image->getClientOriginalName(),
            'stock' => $request->stock,
            'price' => $request->price,
            'id_categorie' => $request->id_categorie,
            'id_pet' => $request->id_pet
        ]);
        $cat = [
            'name' => $categorie->name,
            'discription' => $categorie->discription,
            'image' => $categorie->image,
            'stock' => $categorie->stock,
            'price' => $categorie->price,
            'categorie' => $categorie->pcategorie->name,
            'pet' => $categorie->pet->name
        ];
        return response()->json($cat,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::find($id);
        $cat = [
           'name' => $product->name,
           'discription' => $product->discription,
           'price' => $product->price,
           'stock' => $product->stock,
           'image' => $product->image,
           'categorie' => $product->pcategorie->name,
           'pet' => $product->pet->name
        ];
        return response()->json($cat,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = product::find($id);
        if ($request->image == null) {
            $img = $cat->image;
        }else{
        try {
            $request->image->move(public_path('uploads'),$request->image->getClientOriginalName());
            $img =  $request->image->getClientOriginalName();
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to upload image'], 500);
            }
        } 
        $cat->name = $request->name;
        $cat->discription = $request->discription;
        $cat->image = $img;
        $cat->price = $request->price;
        $cat->stock = $request->stock;
        $cat->id_categorie = $request->id_categorie;
        $cat->id_pet = $request->id_pet;

        $cat->save();
        
        $cat = [
          'massage' => 'Product updated succesfuly'
        ];

        return response()->json($cat,201);
    }
    public function addstock(Request $request, string $id)
    {
        $cat = product::find($id);
        $cat->stock = $cat->stock + $request->stock;

        $cat->save();
        
        $cat = [
          'massage' => 'Product updated succesfuly'
        ];

        return response()->json($cat,201);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = product::findOrfail($id);
        $cat->delete();
        $cat = [
            'massage' => 'Product deleted succesfuly'
          ];
        return response()->json($cat,201);
    }

    public function filter(Request $request){
        $pet = $request->pet;
        $cat = $request->cat;
        if($cat == null){
            return response(["products" => product::whereIn('id_pet',$pet)->with('pcategorie','pet')->get()]);
        }else if($pet == null){
            return response(["products" => product::whereIn('id_categorie',$cat)->with('pcategorie','pet')->get()]);
        }else{
            return response(["products" => product::whereIn('id_pet',$pet)->whereIn('id_categorie',$cat)->with('pcategorie','pet')->get()]);
        }
    }
    public function cat(Request $request){
        $id = $request->all();
       return response(["products" => product::whereIn('id_categorie',$id)->with('pcategorie','pet')->get()]);
    }
}
