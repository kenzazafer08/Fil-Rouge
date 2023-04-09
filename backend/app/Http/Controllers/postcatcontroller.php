<?php

namespace App\Http\Controllers;

use App\Models\postcat;
use Illuminate\Http\Request;

class postcatcontroller extends Controller
{
    public function index()
    {
        return response(['categories' => postcat::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = postcat::create([
            'name' => $request->name,
            'discription' => $request->discription,
            'image' => $request->image
        ]);
        $cat = [
            'name' => $categorie->name,
            'discription' => $categorie->discription,
            'image' => $categorie->image
        ];
        return response()->json($cat,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = postcat::find($id);
        return response()->json($cat,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = postcat::find($id);

        $cat->name = $request->name;
        $cat->discription = $request->discription;
        $cat->image = $request->image;

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
        $cat = postcat::findOrfail($id);
        $cat->product()->delete();
        $cat->delete();
        $cat = [
            'massage' => 'Categorie deleted succesfuly'
          ];
        return response()->json($cat,201);
    }
}
