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
        return response(['products' => product::all()]);
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
        ]);
        $cat = [
            'name' => $categorie->name,
            'discription' => $categorie->discription,
            'image' => $categorie->image,
            'stock' => $categorie->stock,
            'price' => $categorie->price,
            'id_categorie' => $categorie->id_categorie
        ];
        return response()->json($cat,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
