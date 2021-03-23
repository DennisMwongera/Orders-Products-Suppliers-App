<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierProducts;

class SupplierProductsController extends Controller
{
    /*Show a list of  orders */
    public function index() 
    {
        $supplier_products = SupplierProducts::all(['id', 'supply_id', 'product_id', 'created_at']); 
        return response()->json($supplier_products);
    }

       /*show order by particular id*/
       public function getSupplierProducts($id) {
           if (SupplierProducts::where('id', $id)->exists()) {
             $supplier_products = SupplierProducts::where('id', $id)->get()->toJson();
             return response($supplier_products);
           } else {
             return response()->json([
               "Order" => "SupplierProducts not found"
             ], 404);
           }
         }
   
     
       /*create a new order */
       public function createSupplierProducts(Request $request) {
           $supplier_products = new SupplierProducts;
           $supplier_products->id = $request->id;
           $supplier_products->supply_id = $request->supply_id;
           $supplier_products->product_id = $request->product_id;
           $supplier_products->created_at = $request->created_at;
           $supplier_products->save();
     
           return response()->json([
             "message" => "SupplierProducts created"
           ], 201);
         }
   
   
       /*update/edit an order */
       public function updateSupplierProducts(SupplierProducts $request, $id) {
           if (SupplierProducts::where('id', $id)->exists()) {
             $supplier_products = SupplierProducts::find($id);
     
             $supplier_products->id = ($request->id) ? $supplier_products->id : $supplier_products->id;
             $supplier_products->supply_id = ($request->supply_id) ? $supplier_products->supply_id : $supplier_products->supply_id;
             $supplier_products->product_id = ($request->product_id) ? $supplier_products->product_id : $supplier_products->product_id;
             $supplier_products->created_at = ($request->created_at) ? $supplier_products->created_at : $supplier_products->created_at;
             $supplier_products->save();
     
             return response()->json([
               "message" => "SupplierProducts updated successfully"
             ], 200);
           } else {
             return response()->json([
               "message" => "SupplierProducts not found"
             ], 404);
           }
         }
   
        /*delete an  order */
       public function deleteSupplierProducts ($id) {
           if(SupplierProducts::where('id', $id)->exists()) {
             $supplier_products = SupplierProducts::find($id);
             $supplier_products->delete();
     
             return response()->json([
               "message" => "SupplierProduct deleted"
             ], 202);
           } else {
             return response()->json([
               "message" => "SupplierProduct not found"
             ], 404);
           }
         }
}
