@extends('adminlte::page')

@section('title', 'Prices')

@section('content_header')
    <h1>Add Price</h1>
@stop

@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.price_includes.store')}}" method="post">
                    {{csrf_field()}}
                    
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
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Additional quantity</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('additional_qty') ?'is_invalid' :''}}" type="text"  name="additional_qty">
                            @if($errors->has('additional_qty'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('additional_qty')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Additional price</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('additional_price') ?'is-invalid' :''}}" type="text"  name="additional_price">
                            @if($errors->has('additional_price'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('additional_price')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-2 col-form-label">Includes</label>
                        <div class="col-10">
                            <input class="form-control {{$errors->has('includes') ?'is-invalid' :''}}" type="text"  name="includes">
                            @if($errors->has('includes'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('includes')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Add Price Includes</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop