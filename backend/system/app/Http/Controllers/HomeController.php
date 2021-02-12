<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Cover;
use App\Models\Step;
use App\Models\Sipping_zone as Shipping;
use DB;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function get_products(){
        
        $data = Category::with('children:id,slug,name as title,image,width,height,category')->get(['id','slug','name as title','image','width','height']);
        
        return response()->json($data, 200);
    }
    public function get_sub_category($slug){
        $id = Category::where('slug','=',$slug)->get(['id']);
        $data = Sub_category::where('category','=',$id[0]['id'])->get(['id','slug','name as title','image','width','height']);
        if(sizeof($data) < 0){
            return response()->json(["message" => "No Categories"],200);
        }
        return response()->json($data, 200);
    }

    public function steps($category,$subcategory=null){

        $cat_id = Category::where('slug','=',$category)->get(['id']);
        $data = Step::with('step_body_content:cover_type,name,photo,category,sub_category')
        ->where('steps.category','=',$cat_id[0]['id'])
        ->get(['steps.step_position', 'steps.category', 'steps.step_name', 'steps.step_type as step_body_type', 'steps.description as step_desc','steps.cover_type']);
        
        if(isset($subcategory)){
            $sub_cat = Sub_category::where('slug','=',$subcategory)->get(['id']);
            $data = Step::with('step_body_content:cover_type,name,photo,category,sub_category')
            ->where('steps.category','=',$cat_id[0]['id'])
            ->where('steps.sub_category','=',$sub_cat[0]['id'])
            ->get(['steps.step_position', 'steps.category', 'steps.sub_category', 'steps.step_name', 'steps.step_type as step_body_type', 'steps.description as step_desc','steps.cover_type']);
            
        }
        return response()->json($data, 200);
    }

    public function shipping($zone){
        $data = Shipping::where('zone','=',$zone)->get(['cost']);
        return response()->json($data, 200);
    }

    public function price($category){
        
        $cat_id = Category::where('slug','=',$category)->get(['id']);
        $qty = DB::table('prices')->where('category','=',$cat_id[0]['id'])->get('quantity');
        $price = DB::table('prices')->where('category','=',$cat_id[0]['id'])->get('price');
        $pr= []; $qt = [];
        foreach($price as $p){
            array_push($pr,$p->price);
        }
        foreach($qty as $q){
            array_push($qt,$q->quantity);
        }
        $inc = DB::table('price_includes')->where('category','=',$cat_id[0]['id'])->get(['category','additional_qty','additional_price','includes']);
        
        $data = [
            'category'=>$category,
            'quantity'=>$qt,
            'prices'=>$pr,
            'additional_qty'=>$inc[0]->additional_qty,
            'additional_price'=>$inc[0]->additional_price,
            'includes'=>$inc[0]->includes,
        ];
    
        return response()->json($data, 200);
    }

    
}