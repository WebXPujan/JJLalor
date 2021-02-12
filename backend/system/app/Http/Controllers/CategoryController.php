<?php

namespace App\Http\Controllers;

use App\Models\Categoru;
use Illuminate\Http\Request;
use App\Models\Category;


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
        $data = $this->category->get(['slug','name','width','height','image']);
        return response()->json($data, 200);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoru  $categoru
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categoru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoru  $categoru
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoru $categoru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoru  $categoru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoru $categoru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoru  $categoru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoru $categoru)
    {
        //
    }
}
