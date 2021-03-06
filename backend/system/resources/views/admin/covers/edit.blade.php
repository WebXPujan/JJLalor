@extends('adminlte::page')

@section('title', 'Covers')

@section('content_header')
    <h1>Update Cover {{$data->name}}</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.covers.update',$data->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row {{$errors->has('name') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="name" value="{{$data->name}}">
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
                            @foreach(App\Models\Category::getAll() as $d) 
                                <option value="{{$d->id}}" @if($data->category == $d->id) selected @endif>{{$d->name}} </option>
                             @endforeach                             
                        </select>
                        @if($errors->has('category'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-2">Sub Category</label>
                        <div class="col-4">
                        <select name="sub_category" id="" class="form-control">                            
                            @foreach(App\Models\Sub_category::getAll() as $d) 
                                <option value="{{$d->id}}" @if($data->sub_category == $d->id) selected @endif>{{$d->name}}</option>
                            @endforeach                           
                        </select>
                        @if($errors->has('sub_category'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('sub_category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-2">Cover Type</label>
                        <div class="col-4">
                        <select name="cover_type" id="" class="form-control">                            
                                <option value="1" @if($data->cover_type == 1) selected @endif> Front Cover </option>
                                <option value="2" @if($data->cover_type == 2) selected @endif> Back Cover </option>
                                <option value="3" @if($data->cover_type == 3) selected @endif> Inside Left Cover </option>                            
                                <option value="4" @if($data->cover_type == 4) selected @endif> Inside Right Cover </option>                            
                        </select>
                        @if($errors->has('cover_type'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('cover_type')}}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('phopto') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Insert Image</label>
                        <div class="col-10">
                            <input type="file" name="photo">
                            @if($errors->has('photo'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('photo')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cover Type HTML</label>
                        <div class="col-10">
                            <x-adminlte-text-editor name="cover_type_html">
                                {{$data->cover_type_html}}
                        </x-adminlte-text-editor>
                        @if($errors->has('cover_type_html'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('cover_type_html')}}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cover Type text</label>
                        <div class="col-10">
                            <textarea name="cover_type_text" class="form-control">{{$data->cover_type_text}}</textarea>                            
                        </div>
                        @if($errors->has('cover_type_text'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('cover_type_text')}}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Update Cover</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop