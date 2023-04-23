<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\postcat;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function index()
    {
        return response(['posts' => post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = post::create([
            'Title' => $request->Title,
            'text' => $request->text,
            'image' => $request->image,
            'id_cat' => $request->id_cat,
        ]);
        $cat = [
            'Title' => $categorie->Title,
            'text' => $categorie->text,
            'image' => $categorie->image,
            'categorie' => $categorie->postcat->name,
        ];
        return response()->json($cat,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = post::find($id);
        $cat = [
           'Title' => $post->Title,
           'text' => $post->text,
           'image' => $post->image,
           'categorie' => $post->postcat->name,
        ];
        return response()->json($cat,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = post::find($id);

        $cat->Title = $request->Title;
        $cat->text = $request->text;
        $cat->image = $request->image;
        $cat->id_cat = $request->id_cat;

        $cat->save();
        
        $cat = [
          'massage' => 'post updated succesfuly'
        ];

        return response()->json($cat,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = post::findOrfail($id);
        $cat->delete();
        $cat = [
            'massage' => 'post deleted succesfuly'
          ];
        return response()->json($cat,201);
    }
    public function statistics(){
        $post = post::count();
        $categorie = postcat::count();
        return response([
            'post' => $post,
            'categories' => $categorie,
         ]);
    }
}
