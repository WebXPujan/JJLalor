@extends('adminlte::page')
@section('title', 'Shipping Zones')
@section('content_header')
    <h1>Add Shipping Zone</h1>
@stop
@section('content')
    <section class="content">      
        <div class="row">
            <div class="col-md-9">
                <form action="{{route('admin.shipping_zones.store')}}" method="post">
                    {{csrf_field()}}                    
                    <div class="form-group row {{$errors->has('zone') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Zone</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="zone" required>
                            @if($errors->has('zone'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('zone')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('cost') ?'has-error' :''}}">
                        <label class="col-2 col-form-label">Cost</label>
                        <div class="col-10">
                            <input class="form-control" type="text"  name="cost" required>
                            @if($errors->has('cost'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('cost')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="add">Add Details</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop