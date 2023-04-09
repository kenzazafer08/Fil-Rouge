<?php

namespace App\Http\Controllers;

use App\Models\pet;
use Illuminate\Http\Request;

class petcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(['pets' => pet::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = pet::create([
            'name' => $request->name,
            'image' => $request->image
        ]);
        $cat = [
            'name' => $categorie->name,
            'image' => $categorie->image
        ];
        return response()->json($cat,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = pet::find($id);
        return response()->json($cat,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = pet::find($id);

        $cat->name = $request->name;
        $cat->image = $request->image;

        $cat->save();
        
        $cat = [
          'massage' => 'Pet updated succesfuly'
        ];

        return response()->json($cat,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = pet::findOrfail($id);
        $cat->products()->delete();
        $cat->delete();
        $cat = [
            'massage' => 'Pet deleted succesfuly'
          ];
        return response()->json($cat,201);
    }
}
