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
    $image = $request->image;
    if (!$image) {
        return response()->json(['error' => 'No image provided'], 400);
    }
    try {
        $image->move(public_path('pets'),$image->getClientOriginalName());
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to upload image'], 500);
    }
        $categorie = pet::create([
            'name' => $request->name,
            'image' => $image->getClientOriginalName()
        ]);
        $cat = [
            'name' => $categorie->name,
            'image' => $image
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
        $cat->image = $img;

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
        $cat->delete();
        $cat = [
            'massage' => 'Pet deleted succesfuly'
          ];
        return response()->json($cat,201);
    }
}
