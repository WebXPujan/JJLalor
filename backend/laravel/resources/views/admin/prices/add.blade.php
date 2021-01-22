@extends('adminlte::page')

@section('title', 'Prices')

@section('content_header')
    <h1>Add Price</h1>
@stop

@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.prices.store')}}" method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group row">
                        <label class=" col-2">Category</label>
                        <div class="col-4">
                        <select name="category" id="" class="form-control">  
                            @foreach(App\Models\Category::getAll() as $d)  
                                <option value="{{$d->id}}">{{$d->name}} </option>
                            @endforeach                          
                        </select>
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('name') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">quantity</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="quantity" required>
                            @if($errors->has('quantity'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('quantity')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('name') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">price</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="price" required>
                            @if($errors->has('price'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('price')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Add Price</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop