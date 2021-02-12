@extends('adminlte::page')

@section('title', 'Covers')

@section('content_header')
    <h1>Covers</h1>
@stop
@section('plugins.Datatables', true)

@section('content')
    <a class="btn btn-primary m-2 float-right" target="_self" href="{{route('admin.covers.add')}}"><i class="fas fa-plus"></i>Add New </a>
    @if(\Session::has('fail'))
    <x-adminlte-alert theme="danger" title="Error" dismissable>
        {!! \Session::get('fail') !!}
    </x-adminlte-alert>
    @endif
@php
$heads = [
    'ID',
    'Name',
    'Category',
    'Sub Category',
    'Cover Type',
    ['label' => 'Photo', 'width' => 20],
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
    array_push($config['data'],[$d->id,$d->name,App\Models\Category::getName($d->category),(isset($d->sub_category)? App\Models\Sub_category::getName($d->sub_category):'NA'),$d->cover_type,'<img src="uploads/cover/full/'.$d->photo.'" style="max-height:60px; width:auto;"/>', '<nobr>'.'<a href="'.route('admin.covers.edit',$d->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </a>'.'<a href="'.route('admin.covers.destroy',$d->id).'" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
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