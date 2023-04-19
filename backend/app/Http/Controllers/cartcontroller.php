<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartcontroller extends Controller
{
    public function index()
    {
        $cart = cart::where('user_id', Auth::id())->with('product')->get();
        return response(['cart' => $cart]);
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
        $id_product = $id;
        $id_user = Auth::id();
        $deleted = cart::where('product_id', $id_product)->where('user_id', $id_user)->delete();
        if ($deleted > 0) {
            return response('Cart item deleted successfully');
        } else {
            return response('Cart item not found', 404);
        }
    }
    public function count(){
        $products = cart::where('user_id',Auth::id())->get();
        $total = 0;
        foreach($products as $product){
            $total = $total + $product->prix_q;
        }
        $cart = [
          'count' => $products->count(),
          'total' => $total
        ];
        return response($cart,201);
    }
    public function quantity(Request $request, $id)
    {
        $id_product = $id;
        $id_user = Auth::id();
        $cart = cart::where('product_id', $id_product)
                    ->where('user_id', $id_user)
                    ->first();
        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->prix_q = $request->prix_q;
            $cart->save();
        }
        return $cart;
    }
}
