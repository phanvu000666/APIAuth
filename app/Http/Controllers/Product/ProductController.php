<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductModel;
class ProductController extends Controller
{
    public function product(){
        return response()->json(ProductModel::get(), 200);
    }
    public function productByID($id){
        $product = ProductModel::find($id);
        if(is_null($product)){
            return response()->json(["message" => "record not found"], 404);
        }
        return response()->json($product, 200);
    }
    // public function productSave(Request $request){
    //     $product = ProductModel::create($request->all());
    //     return response()->json($product, 201);
    // }
}
