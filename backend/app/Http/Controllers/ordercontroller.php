<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    public function index(){
    return response(['orders' => order::with('user', 'order_line.product.pcategorie', 'order_line.product.pet')->get()]);    
    }

    public function store(Request $request){
        $order = new Order;
        $order->user_id = Auth::id();
        $order->total = $request->total;
        $order->save();

   foreach ($request->order_lines as $order_line) {
    $order->order_line()->create([
        'order_id' => $order->id, // associate the order_id with the order_line record
        'product_id' => $order_line['product_id'],        
        'quantity' => $order_line['quantity'],        
        'prix_q' => $order_line['prix_q']
    ]);
    }
    cart::where('user_id', Auth::id())->delete();
    return response(['order' => $order]);
    }
}
