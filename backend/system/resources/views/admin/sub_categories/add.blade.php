@extends('adminlte::page')

@section('title', 'Sub Categories')

@section('content_header')
    <h1>Add Sub Category</h1>
@stop

@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.sub_categories.store')}}" method="post" enctype="multipart/form-data">
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
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Height</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('height') ?'is-invalid' :''}}" value="{{old('height')}}" type="text"  name="height">
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
                            <input class="form-control {{$errors->has('width') ?'is-invalid' :''}}" value="{{old('width')}}" type="text"  name="width">
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
                            <option value="" selected disabled>Choose Category</option>
                            @foreach(App\Models\Category::getAll() as $d)  
                                <option value="{{$d->id}}">{{$d->name}} </option>
                            @endforeach                          
                        </select>
                        @if($errors->has('category'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('image') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Upload Image</label>
                        <div class="col-2">
                            <input type="file" name="image" required>
                            @if($errors->has('image'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('image')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Add  Sub Category</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop