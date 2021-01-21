<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private $price;
    public function __construct(Price $price){
        $this->price = $price;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->price->get();
        return view('admin.prices.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'category'=>$request->input('category'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price')
        ];

        $price = $this->price->create($data);
        return redirect()->route('admin.prices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price,$id)
    {
        $data = $this->price->find($id);
        return view('admin.prices.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price,$id)
    {
        $data = [
            'name'=>$request->input('name'),
            'category'=>$request->input('category'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price')
        ];

        $d = $this->price->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.prices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price,$id)
    {
        $this->price->find($id)->delete();
        return redirect()->route('admin.prices');
    }
}
