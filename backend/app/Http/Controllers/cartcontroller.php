<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartcontroller extends Controller
{
    public function index(){
        return response(['cart' => cart::where('user_id',Auth::id())->with('product')->get()]);        
    }
    public function store(Request $request, String $id)
    {
        $id_product = $id;
        $id_user = Auth::id();
        $cart = cart::updateOrCreate(
            ['product_id' => $id_product, 'user_id' => $id_user],
            ['quantity' => $request->quantity, 'prix_q' => $request->prix_q]
        );
        return response($cart);
    }
    public function remove(string $id){
      $cart = cart::find($id);
      $cart->delete();
      $cat = [
        'message' => 'Product removed succesfuly'
      ];
      return response()->json($cat,201);
    }
}
