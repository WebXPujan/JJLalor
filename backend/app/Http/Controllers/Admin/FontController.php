<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Font;
use Illuminate\Http\Request;
use App\Http\Requests\FontRequest;

class FontController extends Controller
{
    private $font;
    public function __construct(Font $font){
        $this->font = $font;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->font->get();
        return view('admin.fonts.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fonts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FontRequest $request)
    {
        $data = [
            'name'=>$request->input('name')
        ];

        if($request->hasFile('file')) {
            $f = $request->file('file');
                $extension = $f->getClientOriginalExtension();
                $filename  = $f->getClientOriginalName();
                $destination = 'uploads/fonts/';
                $f->move($destination,$filename);
                $documentName =$filename;
                $data['file'] = $documentName;
        }   

        $font = $this->font->create($data);
        return redirect()->route('admin.fonts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function show(Font $font)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function edit(Font $font,$id)
    {
        $data = $this->font->find($id);
        return view('admin.fonts.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function update(FontRequest $request, Font $font,$id)
    {
        $data = [
            'name'=>$request->input('name')
        ];

        if($request->hasFile('file')) {
            $f = $request->file('file');
                $extension = $f->getClientOriginalExtension();
                $filename  = $f->getClientOriginalName();
                $destination = 'uploads/fonts/';
                $f->move($destination,$filename);
                $documentName =$filename;
                $data['file'] = $documentName;
        }   

        $d = $this->font->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.fonts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function destroy(Font $font,$id)
    {
        $this->font->find($id)->delete();
        return redirect()->route('admin.fonts');
    }
}
