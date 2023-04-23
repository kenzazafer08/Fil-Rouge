<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\postcat;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function index()
    {
        return response(['posts' => post::with('postcat','comment')->get()]);
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
        $categorie = post::create([
            'Title' => $request->Title,
            'text' => $request->text,
            'image' => $image->getClientOriginalName(),
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
    public function random(){
        return response(['posts' => post::with('postcat')->inRandomOrder()->Limit(2)->get()]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = post::with('postcat','comment.user')->where('id',$id)->first();
        $cat = [
           'Title' => $post->Title,
           'text' => $post->text,
           'image' => $post->image,
           'categorie' => $post->postcat->name,
           'comments' => $post->comment
        ];
    
        return response()->json($cat,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = post::find($id);
        $cat = postcat::find($id);
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
        $cat->Title = $request->Title;
        $cat->text = $request->text;
        $cat->image = $request->$img;
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
