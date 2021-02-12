<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Step;
use Illuminate\Http\Request;
use App\Http\Requests\StepRequest;


class StepController extends Controller
{
    private $step;
    public function __construct(Step $step){
        $this->step = $step;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->step->get();
       
        return view('admin.steps.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.steps.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepRequest $request)
    {
        $data = [
            'category'=>$request->input('category'),
            'sub_category'=>$request->input('sub_category'),
            'step_position'=>$request->input('step_position'),
            'step_name'=>$request->input('step_name'),
            'cover_type'=>$request->input('cover_type'),
            'step_type'=>$request->input('step_type'),
            'description'=>$request->input('description')
        ];

        $step = $this->step->create($data);
        return redirect()->route('admin.steps');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step, $id)
    {
        $data = $this->step->find($id);
        return view('admin.steps.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function update(StepRequest $request, Step $step, $id)
    {
        $data = [
            'category'=>$request->input('category'),
            'sub_category'=>$request->input('sub_category'),
            'step_position'=>$request->input('step_position'),
            'step_name'=>$request->input('step_name'),
            'cover_type'=>$request->input('cover_type'),
            'step_type'=>$request->input('step_type'),
            'description'=>$request->input('description')
        ];

        $d = $this->step->findOrFail($id);
        $d->update($data);
        return redirect()->route('admin.steps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step, $id)
    {
        
        try {
            $this->step->find($id)->delete();
          
          } catch (\Illuminate\Database\QueryException $e) {
            
              return redirect()->back()->with('fail', 'unable to delete');   
            }
            
            return redirect()->route('admin.steps');
    
    }
    
}
