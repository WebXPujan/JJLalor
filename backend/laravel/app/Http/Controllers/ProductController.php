<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
class ProductController extends Controller
{
    public function getProduct(){
        $pr = Product::get();
        return response()->json($pr,200);
    }
    public function updateProduct(Request $request){
        
    }
    public function storeProduct(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'image' => 'required|file|max:60',
            'slug' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $slug = Product::where('slug',$request->slug)->get();
       // return $slug;
        if(sizeof($slug) > 0){
            return response()->json(["message" => "Slug Repeated"],200);
        }
        return response()->json(["message" => "Saved Succesfully"],200);
    }
}
