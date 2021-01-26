<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use App\Http\Requests\CoverRequest;

class CoverController extends Controller
{
    private $cover;
    public function __construct(Cover $cover){
        $this->cover = $cover;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->cover->get();
        return view('admin.covers.index')->with(compact('data'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.covers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoverRequest $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'category'=>$request->input('category'),
            'sub_category'=>$request->input('sub_category'),
            'cover_type'=>$request->input('cover_type'),
            'cover_type_html'=>$request->input('cover_type_html'),
            'cover_type_text'=>$request->input('cover_type_text')
        ];

        if(!is_null($request->file('photo'))) { //checks if we do have file or not
            $f = $request->file('photo');
                $extension = $f->getClientOriginalExtension(); //get file extension
                $filename  = Str::random(19).'.'.$extension; //randomstring generate
                $destination = 'uploads/main/';                
                $file=Image::make($f);
                $file->orientate();
                $file->crop(224,224);
                $file->save($destination.$filename,100);
                $file->save('uploads/cover/full/'.$filename,100);
                $file->resize(114, 114, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/cover/thumb/thumb_'.$filename,100);
                $data['photo'] = $filename;           
        }
        $cover = $this->cover->create($data);
        return redirect()->route('admin.covers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function show(Cover $cover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function edit(Cover $cover,$id)
    {
        $data = $this->cover->find($id);
        return view('admin.covers.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function update(CoverRequest $request, Cover $cover,$id)
    {
        $data = [
            'name'=>$request->input('name'),
            'category'=>$request->input('category'),
            'sub_category'=>$request->input('sub_category'),
            'cover_type'=>$request->input('cover_type'),
            'cover_type_html'=>$request->input('cover_type_html'),
            'cover_type_text'=>$request->input('cover_type_text')
        ];

        if(!is_null($request->file('photo'))) { //checks if we do have file or not
            $f = $request->file('photo');
                $extension = $f->getClientOriginalExtension(); //get file extension
                $filename  = Str::random(19).'.'.$extension; //randomstring generate
                $destination = 'uploads/main/';                
                $file=Image::make($f);
                $file->orientate();
                $file->crop(224,224);
                $file->save($destination.$filename,100);
                $file->save('uploads/cover/full/'.$filename,100);
                $file->resize(114, 114, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/cover/thumb/thumb_'.$filename,100);
                $data['photo'] = $filename;           
        }
        $d = $this->cover->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.covers');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cover $cover,$id)
    {
        $this->cover->find($id)->delete();
        return redirect()->route('admin.covers');
    }
}
