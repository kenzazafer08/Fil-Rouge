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

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = product::create([
            'name' => $request->name,
            'discription' => $request->discription,
            'image' => $request->image,
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

        $cat->name = $request->name;
        $cat->discription = $request->discription;
        $cat->image = $request->image;
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
}
