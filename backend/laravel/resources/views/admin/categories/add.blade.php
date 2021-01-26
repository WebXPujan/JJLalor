@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Add Category</h1>
@stop
@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('name') ?'is-invalid' :''}}" value="{{old('name')}}" type="text"  name="name">
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('image') ?'is-invalid' :''}}">
                        <label class="col-2 col-form-label">Upload Image</label>
                        <div class="col-10">
                            <input type="file" name="image">
                            @if($errors->has('image'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('image')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Add Categories</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop