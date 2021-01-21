@extends('adminlte::page')

@section('title', 'Covers')

@section('content_header')
    <h1>Add Cover</h1>
@stop

@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.covers.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row {{$errors->has('name') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="name">
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-2">Category</label>
                        <div class="col-4">
                        <select name="category" id="" class="form-control">                            
                                <option value="2" > Administrator </option>
                                <option value="3" > User </option>                            
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-2">Sub Category</label>
                        <div class="col-4">
                        <select name="sub_category" id="" class="form-control">                            
                                <option value="2" > Administrator </option>
                                <option value="3" > User </option>                            
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-2">Cover Type</label>
                        <div class="col-4">
                        <select name="cover_type" id="" class="form-control">                            
                                <option value="1" > Front Cover </option>
                                <option value="2" > Back Cover </option>
                                <option value="3" > Inside Left Cover </option>                            
                                <option value="4" > Inside Right Cover </option>                            

                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cover Type HTML</label>
                        <div class="col-10">
                            <textarea name="cover_type_html" class="form-control"></textarea>                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cover Type text</label>
                        <div class="col-10">
                            <textarea name="cover_type_text" class="form-control"></textarea>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Add Cover</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop