<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class ordercontroller extends Controller
{
    public function index(){
    return response(['orders' => order::with('user', 'order_line.product.pcategorie', 'order_line.product.pet')->get()]);    
    }
    public function show($id)
    {
        return response(['order' => (Order::with('user', 'order_line.product.pcategorie', 'order_line.product.pet')->with(['order_line.product' => function ($query) {
            $query->withTrashed();
        }])->where('id',$id)->first())]);
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
        
            // Update product stock
            foreach ($order_lines as $order_line) {
                $product = product::find($order_line['product_id']);
                $product->stock -= $order_line['quantity'];
                $product->save();
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
    public function count(){
        return response(order::where('Status','2')->firstOrFail());
    }

    public function status(Request $request,$id){
        $order = order::find($id);
        $order->Status = $request->status;
        $order->save();
        return $order;
    }
}
