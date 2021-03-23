<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;

class OrderDetailsController extends Controller
{
    public function index() 
    {
        $order_details = OrderDetails::all(['id','order_id','product_id']); 
        return response()->json($order_details);
    }

    // public function getOrderDetails() {
    //     return $this->belongsTo('App\Models\Orders', 'App\Models\Products');
    // }

        /*show order by particular Order Detail ID*/
        public function getOrderDetails($id) {
            if (OrderDetails::where('id', $id)->exists()) {
              $order_details = OrderDetails::where('id', $id)->get()->toJson();
              return response($order_details);
            } else {
              return response()->json([
                "OrderDetail" => "OrderDetail not found"
              ], 404);
            }
          }

    /*update/edit an Order Detail*/
    public function updateOrder(Request $request, $id) {
        if (Orders::where('id', $id)->exists()) {
          $orders = Orders::find($id);
  
          $orders->id = is_null($request->id) ? $orders->id : $orders->id;
          $orders->order_number = is_null($request->order_number) ? $orders->order_number : $orders->order_number;
          $orders->save();
  
          return response()->json([
            "message" => "order updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "order not found"
          ], 404);
        }
      }
    
}
