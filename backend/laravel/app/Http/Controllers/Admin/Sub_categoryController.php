<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class Sub_categoryController extends Controller
{
    private $sub_category;
    public function __construct(Sub_category $category){
        $this->sub_category = $sub_category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->sub_category->get();
        return view('admin.sub_categories.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub_categories.add');
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
            'slug'=>str_replace(' ', '', $request->input('name'))
        ];

        if(!is_null($request->file('image'))) { //checks if we do have file or not
            $f = $request->file('image');
                $extension = $f->getClientOriginalExtension(); //get file extension
                $filename  = str_random(19).'.'.$extension; //randomstring generate
                $destination = 'uploads/main/';                
                $file=Image::make($f);
                $file->orientate();
                $file->crop(224,224);
                $file->save($destination.$filename,100);
                $file->save('uploads/sub_category/full/'.$filename,100);
                $file->resize(114, 114, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/sub_category/thumb/thumb_'.$filename,100);
                $data['image'] = $filename;           
        }
        $sub_category = $this->sub_category->create($data);
        return redirect()->route('admin.sub_categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_category $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_category $sub_category,$id)
    {
        $data = $this->sub_category->find($id);
        return view('admin.sub_categories.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub_category $sub_category,$id)
    {
        $data = [
            'name'=>$request->input('name'),
            'category'=>$request->input('category'),
            'slug'=>str_replace(' ', '', $request->input('name'))
        ];

        if(!is_null($request->file('image'))) { //checks if we do have file or not
            $f = $request->file('image');
                $extension = $f->getClientOriginalExtension(); //get file extension
                $filename  = str_random(19).'.'.$extension; //randomstring generate
                $destination = 'uploads/main/';                
                $file=Image::make($f);
                $file->orientate();
                $file->crop(224,224);
                $file->save($destination.$filename,100);
                $file->save('uploads/sub_category/full/'.$filename,100);
                $file->resize(114, 114, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/sub_category/thumb/thumb_'.$filename,100);
                $data['image'] = $filename;           
        }
        $d = $this->sub_category->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.sub_categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_category $sub_category,$id)
    {
        $this->sub_category->find($id)->delete();
        return redirect()->route('admin.sub_categories');
    }
}
