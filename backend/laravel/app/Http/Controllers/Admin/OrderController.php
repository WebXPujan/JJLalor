<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order;
    public function __construct(Order $order){
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->order->get();
        return view('admin.orders.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.add');
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
            'address_one'=>$request->input('address_one'),
            'address_two'=>$request->input('address_two'),
            'address_three'=>$request->input('address_three'),
            'country'=>$request->input('country'),
            'postal_code'=>$request->input('postal_code'),
            'shipping_zone'=>$request->input('shipping_zone'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'category'=>$request->input('category'),
            'product_html'=>$request->input('product_html'),
        ];

        if($request->hasFile('product_image_pdf')) {
            $f = $request->file('product_image_pdf');
                $extension = $f->getClientOriginalExtension();
                $filename  = $f->getClientOriginalName();
                $destination = 'uploads/product_image_pdf/';
                $f->move($destination,$filename);
                $documentName =$filename;
                $data['product_image_pdf'] = $documentName;
        }   

        $order = $this->order->create($data);
        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order,$id)
    {
        $data = $this->order->find($id);
        return view('admin.orders.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order,$id)
    {
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
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'category'=>$request->input('category'),
            'product_html'=>$request->input('product_html'),
        ];

        if($request->hasFile('product_image_pdf')) {
            $f = $request->file('product_image_pdf');
                $extension = $f->getClientOriginalExtension();
                $filename  = $f->getClientOriginalName();
                $destination = 'uploads/product_image_pdf/';
                $f->move($destination,$filename);
                $documentName =$filename;
                $data['product_image_pdf'] = $documentName;
        }   

        $d = $this->prder->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order,$id)
    {
        $this->order->find($id)->delete();
        return redirect()->route('admin.orders.index');
    }
}
