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
            'id_user' => $id_user,
            'value' => $request->value,
            'comment' => $request->comment
        ]);
        return response($review);
    }
    public function remove(string $id){
      //
    }
}
