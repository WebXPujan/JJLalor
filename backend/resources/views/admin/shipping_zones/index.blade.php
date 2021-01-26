@extends('adminlte::page')

@section('title', 'Shipping Zones')

@section('content_header')
    <h1>Shipping Zones</h1>
@stop
@section('plugins.Datatables', true)

@section('content')
    <a class="btn btn-primary m-2 float-right" target="_self" href="{{route('admin.shipping_zones.add')}}"><i class="fas fa-plus"></i>Add New</a>
    @if(\Session::has('fail'))
    <x-adminlte-alert theme="danger" title="Error" dismissable>
        {!! \Session::get('fail') !!}
    </x-adminlte-alert>
    @endif
@php
$heads = [
    'ID',
    'Shipping Zone',
    'Price',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$config = [
    'data' => [],
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp
@foreach ($data as $d)
@php
    array_push($config['data'],[$d->id,$d->zone,$d->cost,'<nobr>'.'<a href="'.route('admin.shipping_zones.edit',$d->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </a>'.'<a href="'.route('admin.shipping_zones.destroy',$d->id).'" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </a>'.'</nobr>']);
@endphp
@endforeach
{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($config['data'] as $row)
        <tr>
            @foreach($row as $cell)
                <td>{!! $cell !!}</td>
            @endforeach
        </tr>
    @endforeach
</x-adminlte-datatable>
@stop
