<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;

class OrdersController extends Controller
{

    public function getOrderDetails() {
        return $this->hasMany(OrderDetails::class, 'order_id', 'order_number'); 
      
    }


     /*Show a list of  orders */
    public function index() 
    {
        $orders = Orders::all(['id','order_number','created_at']); 
        return response()->json($orders);
    }

    /*show order by particular id*/
    public function getOrder($id) {
        if (Orders::where('id', $id)->exists()) {
          $orders = Orders::where('id', $id)->get()->toJson();
          return response($orders);
        } else {
          return response()->json([
            "Order" => "Order not found"
          ], 404);
        }
      }

  
    /*create a new order */
    public function createOrder(Request $request) {
        $orders = new Orders;
        $orders->id = $request->id;
        $orders->order_number = $request->order_number;
        $orders->created_at = $request->created_at;
        $orders->save();
  
        return response()->json([
          "message" => "Order record created"
        ], 201);
      }


    /*update/edit an order */
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

     /*delete an  order */
    public function deleteOrder ($id) {
        if(Orders::where('id', $id)->exists()) {
          $orders = Orders::find($id);
          $orders->delete();
  
          return response()->json([
            "message" => "order deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "order not found"
          ], 404);
        }
      }
}
