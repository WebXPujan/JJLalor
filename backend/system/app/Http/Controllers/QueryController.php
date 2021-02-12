<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Order;
use DB;
use PDF;



class QueryController extends Controller
{
    private $query,$order;
    public function __construct(Query $query, Order $order){
        $this->query = $query;
        $this->order = $order;
    }

    public function createPdf($viewFile,$dd){
        $qfn = 'orders/pdf/'.$dd->id.'_order.pdf';
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView($viewFile,['data'=>$dd])->setPaper('a4', 'landscape');          
        $pdf->save($qfn);
        return $qfn;
    }
    public function createMergedPdf($fileName,$viewFile,$dd){       
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView($viewFile,['data'=>$dd])->setPaper('a4', 'landscape');          
        $pdf->save('orders/pdf/'.$fileName);
        return true;
    }
    
    public function query_table(Request $request){

        $validator = \Validator::make($request->all(), [
            'category' => 'required',
            'step_position' => 'required',
           
        ]);

        if ($validator->fails()) {           
            $responseArr['message'] = $validator->messages()->first();
            return response()->json($responseArr);
        }

        $data = $request->all();

        $cat_id = Category::where('slug','=',$request->input('category'))->get(['id']);
        if($cat_id->isEmpty()){
            $responseArr['message'] = 'Category Not Found';
            return response()->json($responseArr);
        }

        if($request->input('sub_category') != null){
            $sub_cat = Sub_category::where('slug','=',$request->input('sub_category'))->get(['id']); 
            if($sub_cat->isEmpty()){
                $responseArr['message'] = 'Sub Category Not Found';
                return response()->json($reSsponseArr);
            }
        }else{
            $sub_cat[0]['id'] = 0;
        }
        
        $steps = DB::table('steps')
                ->where('step_position','=',$request->input('step_position'))
                ->where('category','=',$cat_id[0]['id'])
                ->where('sub_category','=',$sub_cat[0]['id'])
                ->get(['cover_type']);
        
        if($steps->isEmpty()){
            $responseArr['message'] = 'Steps Not Found';
            return response()->json($responseArr);
        }

        if($steps[0]->cover_type == '1'){
             //insert or update to table
            if($request->input('query_id')){
                $dd = $this->query->findOrFail($request->input('query_id'));
                $dd->update($data); 

                $file = $this->createPdf('front_cover',$dd);

                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200);
            }else{
                $dd = $this->query->create($data);

                $file = $this->createPdf('front_cover',$dd);
                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200);
                
            }
        }elseif($steps[0]->cover_type == '2'){
            //insert or update to table
            if($request->input('query_id')){
                $dd = $this->query->findOrFail($request->input('query_id'));
                $dd->update($data);

                $file = $this->createPdf('back_cover',$dd);
                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200);
            }else{
                $dd = $this->query->create($data);
                $file = $this->createPdf('back_cover',$dd);
                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200);        
            }
        }elseif($steps[0]->cover_type == '3'){
            //insert or update to table
            if($request->input('query_id')){
                $dd = $this->query->findOrFail($request->input('query_id'));
                $dd->update($data);
                $file = $this->createPdf('inside_left',$dd);
                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200); 
               
            }else{
                $dd = $this->query->create($data);
                $file = $this->createPdf('inside_left',$dd);
                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200);
                
            }
        }elseif($steps[0]->cover_type == '4'){
            //insert or update to table
            if($request->input('query_id')){
                $dd = $this->query->findOrFail($request->input('query_id'));
                $dd->update($data);
                $file = $this->createPdf('inside_right',$dd);
                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200);
            }else{
                $dd = $this->query->create($data); 
                $file = $this->createPdf('inside_right',$dd);
                $data = [
                    'query_id'=>$dd->id,
                    'file' => $file
                ];
                return response()->json($data, 200);
            }
        }else{
            return  response()->json('failed', 200);
        }
        
    }

    public function preview(Request $request){
        $dd = $this->query->findOrFail($request->input('query_id'));

        $front = $request->input('query_id').'_front_side.pdf';
        $file1 = $this->createMergedPdf($front,'front_side',$dd);
        
        $back = $request->input('query_id').'_back_side.pdf';
        $file2 = $this->createMergedPdf($back,'back_side',$dd);

        $data = [
            'query_id'=>$request->input('query_id'),
             'front_side' => 'orders/pdf/'.$front,
            'back_side' => 'orders/pdf/'.$back
        ];
        return response()->json($data, 200);
    }

    public function order(Request $request){
        
        $data = [
            'name'=>$request->input('name'),
            'address_one'=>$request->input('address_one'),
            'address_two'=>$request->input('address_two'),
            'address_three'=>$request->input('address_three'),
            'country'=>$request->input('country'),
            'postal_code'=>$request->input('postal_code'),
            'shipping_zone'=>$request->input('shipping_zone'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),            
        ];
        $items[] = $request->input('items');
       for($i=0;$i<count($items);$i++){

            $data =[
            'quantity'=>$items[$i]['quantity'],
            'price'=>$items[$i]['price'],
            'category'=>$items[$i]['category'],
            'product_image_pdf'=>json_encode($items[$i]['product_image'])
            ];

            $dd = $this->order->create($data);

        }


       
        return  response()->json('Successfully Saved', 200);
    
    }
    
}
