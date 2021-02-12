@extends('adminlte::page')

@section('title', 'Sub Categories')

@section('content_header')
    <h1>update Sub Category</h1>
@stop

@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.sub_categories.update',$data->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('name') ?'is-invalid' :''}}" type="text" value="{{$data->name}}"  name="name">
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Height</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('height') ?'is-invalid' :''}}" value="{{$data->height}}" type="text"  name="height">
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('height')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Width</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('width') ?'is-invalid' :''}}" value="{{$data->width}}" type="text"  name="width">
                            @if($errors->has('width'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('width')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-2">Category</label>
                        <div class="col-4">
                        <select name="category" id="" class="form-control">  
                            @foreach(App\Models\Category::getAll() as $d)                                                     
                                <option value="{{$d->id}}" @if($data->category == $d->id) selected @endif>{{$d->name}} </option>
                            @endforeach
                            @if($errors->has('category'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('category')}}</strong>
                                </span>
                            @endif                          
                        </select>
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('image') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Insert to change Image</label>
                        <div class="col-2">
                            <input type="file" name="image">
                            @if($errors->has('image'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('image')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Update Category</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop