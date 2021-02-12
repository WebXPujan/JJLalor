@extends('adminlte::page')
@section('title', 'Steps')
@section('content_header')
    <h1>Update Steps</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.steps.update',$data->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class=" col-2">Category</label>
                        <div class="col-4">
                        <select name="category" id="" class="form-control">
                            <option value="" selected disabled>Choose Category</option>                            
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
                        <label class="col-2">Sub Category</label>
                        <div class="col-4">
                        <select name="sub_category" id="" class="form-control">  
                            <option value="" selected disabled>Choose Sub Category</option>                          
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
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Step Position</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('step_position') ?'is-invalid' :''}}" type="text" value="{{$data->step_position}}"  name="step_position">
                            @if($errors->has('step_position'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('step_position')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Step Name</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('step_name') ?'is-invalid' :''}}" type="text" value="{{$data->step_name}}"  name="step_name">
                            @if($errors->has('step_name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('step_name')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-2">Cover Type</label>
                        <div class="col-4">
                            <select name="cover_type" id="" class="form-control">
                                <option value="" selected disabled>Choose Cover Type</option>                            
                                <option value="1" @if($data->cover_type == '1') selected @endif> Front Cover </option>
                                <option value="2" @if($data->cover_type == '2') selected @endif> Back Cover </option>
                                <option value="3" @if($data->cover_type == '3') selected @endif> Inside Left Cover </option>                            
                                <option value="4" @if($data->cover_type == '4') selected @endif> Inside Right Cover </option>                            
                        </select>
                        @if($errors->has('cover_type'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('cover_type')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Step Type</label>
                        <div class="col-10">
                            <select name="step_type" id="" class="form-control">
                                <option value="" selected disabled>Choose Cover Type</option>                            
                                <option value="cover" @if($data->step_type == 'cover') selected @endif>Cover </option>
                                <option value="radio" @if($data->step_type == 'radio') selected @endif>Radio</option>
                                <option value="form" @if($data->step_type == 'form') selected @endif>Form</option>                            
                                <option value="photo" @if($data->step_type == 'photo') selected @endif>Photo</option>                            
                                <option value="cover_action" @if($data->step_type == 'cover_action') selected @endif>Cover Action</option>                            
                        </select>
                        @if($errors->has('step_type'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('step_type')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('description') ?'is-invalid' :''}}" type="text" value="{{$data->description}}"  name="description">
                            @if($errors->has('description'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Update Step</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop