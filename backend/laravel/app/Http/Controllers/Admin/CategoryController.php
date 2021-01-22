<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{

    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->category->get();
        return view('admin.categories.index')->with(compact('data'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    *
    *
    */

    public function create()
    {
        return view('admin.categories.add');
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
            'slug'=>str_replace(' ', '', $request->input('name'))
        ];

        if(!is_null($request->file('image'))) { //checks if we do have file or not
            $f = $request->file('image');
                $extension = $f->getClientOriginalExtension(); //get file extension
                $filename  = Str::random(19).'.'.$extension; //randomstring generate
                $destination = 'uploads/main/';                
                $file=Image::make($f);
                $file->orientate();
                $file->crop(500,500);
                $file->save($destination.$filename,100);
                $file->save(public_path('uploads/category/full/'.$filename,100));
                $file->resize(114, 114, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/category/thumb/thumb_'.$filename,100));
                $data['image'] = $filename;           
        }
        $category = $this->category->create($data);
        return redirect()->route('admin.categories');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $data = $this->category->find($id);
        return view('admin.categories.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $data = [
            'name'=>$request->input('name'),
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
                $file->save(public_path('uploads/category/full/'.$filename,100));
                $file->resize(114, 114, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/category/thumb/thumb_'.$filename,100));
                $data['image'] = $filename;           
        }
        $d = $this->category->findOrFail($id);
        $d->update($data);

        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {try {
        $this->category->find($id)->delete();
      
      } catch (\Illuminate\Database\QueryException $e) {
        
          return redirect()->back()->with('fail', 'unable to delete');   
        }
        
        return redirect()->route('admin.categories');
    }
}
