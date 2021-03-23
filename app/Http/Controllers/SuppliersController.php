<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    /*Show a list of  orders */
    public function index() 
    {
        $suppliers = Suppliers::all(['id','name','created_at']); 
        return response()->json($suppliers);
    }
 
      /*show order by particular id*/
      public function getSupplier($id) {
          if (Suppliers::where('id', $id)->exists()) {
            $suppliers = Suppliers::where('id', $id)->get()->toJson();
            return response($suppliers);
          } else {
            return response()->json([
              "Order" => "Supplier not found"
            ], 404);
          }
        }
  
    
      /*create a new order */
      public function createSupplier(Request $request) {
          $suppliers = new Suppliers;
          $suppliers->id = $request->id;
          $suppliers->name = $request->name;
          $suppliers->created_at = $request->created_at;
          $suppliers->save();
    
          return response()->json([
            "message" => "Supplier created"
          ], 201);
        }
  
  
      /*update/edit an order */
      public function updateSupplier(Suppliers $request, $id) {
          if (Suppliers::where('id', $id)->exists()) {
            $suppliers = Suppliers::find($id);
    
            $suppliers->id = ($request->id) ? $suppliers->id : $suppliers->id;
            $suppliers->name = ($request->name) ? $suppliers->name : $suppliers->name;
            $suppliers->created_at = ($request->created_at) ? $suppliers->created_at : $suppliers->created_at;
            $suppliers->save();
    
            return response()->json([
              "message" => "Supplier updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Supplier not found"
            ], 404);
          }
        }
  
       /*delete an  order */
      public function deleteSupplier ($id) {
          if(Suppliers::where('id', $id)->exists()) {
            $suppliers = Suppliers::find($id);
            $suppliers->delete();
    
            return response()->json([
              "message" => "Supplier deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Supplier not found"
            ], 404);
          }
        }

}
