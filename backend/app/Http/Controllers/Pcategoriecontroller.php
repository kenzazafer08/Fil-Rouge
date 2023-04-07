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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = Pcategorie::create([
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
