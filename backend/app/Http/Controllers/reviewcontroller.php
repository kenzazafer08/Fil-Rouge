<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reviewcontroller extends Controller
{
    public function store(Request $request,String $id)
    {
        $id_product = $id;
        $id_user = Auth::id();
        $review = review::create([
            'product_id' => $id_product,
            'user_id' => $id_user,
            'value' => $request->value,
            'comment' => $request->comment
        ]);
        return response($review);
    }
    public function remove(string $id){
      $review = review::find($id);
      $review->delete();
      $cat = [
        'message' => 'review deleted succesfuly'
      ];
      return response()->json($cat,201);
    }
}
