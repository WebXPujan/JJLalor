@extends('adminlte::page')

@section('title', 'Fonts')

@section('content_header')
    <h1>Edit Font</h1>
@stop

@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.fonts.update',$data->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('name') ?'is_invalid' :''}}" type="text"  name="name" value="{{$data->name}}">
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('file') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Upload file to update</label>
                        <div class="col-10">
                            <input type="file" name="file">
                            @if($errors->has('file'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('file')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Update Font</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop