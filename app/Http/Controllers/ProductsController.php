<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*Show a list of  orders */
    public function index() 
    {
        $products = Products::all([
            'id',
            'name',
            'description',
            'quantity',
            'created_at'
            ]); 
        return response()->json($products);
    }


 
     /*show order by particular id*/
     public function getProducts($id) {
         if (Products::where('id', $id)->exists()) {
           $products = Products::where('id', $id)->get()->toJson();
           return response($products);
         } else {
           return response()->json([
             "Order" => "Product not found"
           ], 404);
         }
       }
 
   
     /*create a new order */
     public function createProduct(Request $request) {
         $products = new Products;
         $products->id = $request->id;
         $products->name = $request->name;
         $products->description = $request->description;
         $products->quantity = $request->quantity;
         $products->created_at = $request->created_at;
         $products->save();
   
         return response()->json([
           "message" => "Product created"
         ], 201);
       }
 
 
     /*update/edit an order */
     public function updateProduct(Products $request, $id) {
         if (Products::where('id', $id)->exists()) {
           $products = Orders::find($id);
   
           $products->id = ($request->id) ? $products->id : $products->id;
           $products->name = ($request->name) ? $products->name : $products->name;
           $products->description = ($request->description ) ? $products->description : $products->description;
           $products->quantity = ($request->quantity) ? $products->quantity : $products->quantity;
           $products->created_at = ($request->created_at) ? $products->created_at : $products->created_at;
           $products->save();
   
           return response()->json([
             "message" => "Product updated successfully"
           ], 200);
         } else {
           return response()->json([
             "message" => "Product not found"
           ], 404);
         }
       }
 
      /*delete an  order */
     public function deleteProduct ($id) {
         if(Products::where('id', $id)->exists()) {
           $products = Products::find($id);
           $products->delete();
   
           return response()->json([
             "message" => "Product deleted"
           ], 202);
         } else {
           return response()->json([
             "message" => "Product not found"
           ], 404);
         }
       }
}
