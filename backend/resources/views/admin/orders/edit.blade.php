@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Update Orders</h1>
@stop

@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.orders.update',$data->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row {{$errors->has('name') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="name" value="{{$data->name}}" required>
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('address_one') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Address One</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="address_one" value="{{$data->address_one}}" required>
                            @if($errors->has('address_one'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('address_one')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('address_two') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Address Two</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="address_two" value="{{$data->address_two}}">
                            @if($errors->has('address_two'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('address_two')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('address_three') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Address Three</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="address_three" value="{{$data->address_three}}" >
                            @if($errors->has('address_three'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('address_three')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row {{$errors->has('country') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Country</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="country" value="{{$data->country}}" required>
                            @if($errors->has('country'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('country')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('postal_code') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Postal Code</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="postal_code" value="{{$data->postal_code}}" required>
                            @if($errors->has('postal_code'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('postal_code')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div><div class="form-group row {{$errors->has('shipping_zone') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Shipping Zone</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="shipping_zone" value="{{$data->shipping_zone}}" required>
                            @if($errors->has('shipping_zone'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('shipping_zone')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('email') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="email" value="{{$data->email}}" required>
                            @if($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('email')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('phone') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Phone</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="phone" value="{{$data->phone}}" required>
                            @if($errors->has('phone'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('phone')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('quantity') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Quantity</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="quantity" value="{{$data->quantity}}" required>
                            @if($errors->has('quantity'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('quantity')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('price') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Price</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="price"  value="{{$data->price}}" required>
                            @if($errors->has('price'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('price')}}</strong>
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
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Product HTML</label>
                        <div class="col-10">
                            <x-adminlte-text-editor name="product_html">
                                {{$data->product_html}}
                        </x-adminlte-text-editor>
                        </div>
                    </div>

                    <div class="form-group row {{$errors->has('product_image_pdf') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Insert New Product Image to update</label>
                        <div class="col-10">
                            <input class="form-control" type="file" name="product_image_pdf">
                            @if($errors->has('product_image_pdf'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('product_image_pdf')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Update Order</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop