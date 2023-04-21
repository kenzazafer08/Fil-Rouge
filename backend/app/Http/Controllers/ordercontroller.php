<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class ordercontroller extends Controller
{
    public function index(){
    return response(['orders' => order::with('user', 'order_line.product.pcategorie', 'order_line.product.pet')->get()]);    
    }
    public function user(){
        $id = Auth::id();
        return response(['orders' => order::with('user', 'order_line.product.pcategorie', 'order_line.product.pet')->where('user_id',$id)->get()]);    
        }    
    public function store(Request $request){
        $order = new Order;
        $order->user_id = Auth::id();
        $order->total = $request->total;
        $order->save();

        $order_lines = json_decode($request->order_lines, true);
   foreach ($order_lines as $order_line) {
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

    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        $order->order_line()->delete();
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }

    public function facture($id){
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('order', compact('order'));
        return $pdf->download('facture.pdf');
    }
}
