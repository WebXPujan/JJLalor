<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price_include;
use Illuminate\Http\Request;
use App\Http\Requests\Price_includeRequest;
use DB;

class Price_includeController extends Controller
{
    private $price_include;
        public function __construct(Price_include $price_include){
            $this->price_include = $price_include;
        }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('prices')->get();
        $Pricedata = $this->price_include->get();
        return view('admin.prices.index')->with(compact('Pricedata','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.price_includes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Price_includeRequest $request)
    {
            $data = [
            'category'=>$request->input('category'),
            'additional_qty'=>$request->input('additional_qty'),
            'additional_price'=>$request->input('additional_price'),
            'includes'=>$request->input('includes'),
        ];

        $price = $this->price_include->create($data);
        return redirect()->route('admin.price_includes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price_include  $price_include
     * @return \Illuminate\Http\Response
     */
    public function show(Price_includeRequest $request)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price_include  $price_include
     * @return \Illuminate\Http\Response
     */
    public function edit(Price_include $price_include,$id)
    {
        $data = $this->price_include->find($id);
        return view('admin.price_includes.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price_include  $price_include
     * @return \Illuminate\Http\Response
     */
    public function update(Price_includeRequest $request, Price_include $price_include,$id)
    {   
        $data = [
            'category'=>$request->input('category'),
            'additional_qty'=>$request->input('additional_qty'),
            'additional_price'=>$request->input('additional_price'),
            'includes'=>$request->input('includes'),
        ];
    
        $d = $this->price_include->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.price_includes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price_include  $price_include
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price_include $price_include)
    {
        $this->price_include->find($id)->delete();
        return redirect()->route('admin.price_includes');
    }
}
