<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductModel;
class ProductController extends Controller
{
    //lấy table Product
    public function product(){
        return response()->json(ProductModel::get(), 200);
    }
    //Lấy Product dựa vào id
    public function productByID($id){
        $product = ProductModel::find($id);
        if(is_null($product)){
            return response()->json(["message" => "record not found"], 404);
        }
        return response()->json($product, 200);
    }
    //Thêm Product
    public function productSave(Request $request){
        $product = ProductModel::create($request->all());
        return response()->json($product, 201);
    }
    //Sửa Product
    public function productUpdate(Request $request, ProductModel $product){
        $product->update($request->all());
        return response()->json($product, 200);
    }
    //Xoá Product
    public function productDelete(Request $request, ProductModel $product){
        $product->delete();
        return response()->json(NULL, 204);
    }
}
