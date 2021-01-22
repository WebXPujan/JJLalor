<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sipping_zone;
use Illuminate\Http\Request;

class Sipping_zoneController extends Controller
{
    private $zone;
    public function __construct(Sipping_zone $zone){
        $this->zone = $zone;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->zone->get();        
        return view('admin.shipping_zones.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping_zones.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =[
            'zone'=> $request->input('zone'),
            'cost'=> $request->input('cost')
        ];
        $sipping_zone = $this->zone->create($data);
        return redirect()->route('admin.shipping_zones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sipping_zone  $sipping_zone
     * @return \Illuminate\Http\Response
     */
    public function show(Sipping_zone $sipping_zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sipping_zone  $sipping_zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Sipping_zone $sipping_zone,$id)
    {
        $data = $this->zone->find($id);
        return view('admin.shipping_zones.edit')->with(compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sipping_zone  $sipping_zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sipping_zone $sipping_zone,$id)
    {
        $data =[
            'zone'=> $request->input('zone'),
            'cost'=> $request->input('cost')
        ];

        $d = $this->zone->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.shipping_zones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sipping_zone  $sipping_zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sipping_zone $sipping_zone,$id)
    {
        try {
            $this->zone->find($id)->delete();
          
          } catch (\Illuminate\Database\QueryException $e) {
            
              return redirect()->back()->with('fail', 'unable to delete');   
            }            
            return redirect()->route('admin.shipping_zones');
    }
}
