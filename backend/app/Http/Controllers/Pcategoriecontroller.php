<?php

namespace App\Http\Controllers;

use App\Models\Pcategorie;
use Illuminate\Http\Request;

class Pcategoriecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(['categories' => Pcategorie::all()]);
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
    
    $categorie = Pcategorie::create([
        'name' => $request->name,
        'discription' => $request->discription,
        'image' => $image->getClientOriginalName()
    ]);
    
    $cat = [
        'name' => $categorie->name,
        'discription' => $categorie->discription,
        'image' => $categorie->image
    ];
    
    return response()->json($cat, 201);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = Pcategorie::find($id);
        return response()->json($cat,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = Pcategorie::find($id);
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

        $cat->save();
        
        $cat = [
          'massage' => 'Categorie updated succesfuly'
        ];

        return response()->json($cat,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Pcategorie::findOrfail($id);
        $cat->products()->delete();
        $cat->delete();
        $cat = [
            'massage' => 'Categorie deleted succesfuly'
          ];
        return response()->json($cat,201);
    }
}
