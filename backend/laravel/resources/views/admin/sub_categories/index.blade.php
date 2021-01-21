@extends('adminlte::page')

@section('title', 'Sub Categories')

@section('content_header')
    <h1>Sub Categories</h1>
@stop
@section('plugins.Datatables', true)

@section('content')
    <a class="btn btn-primary m-2 float-right" target="_self" href="{{route('admin.sub_categories.add')}}"><i class="fas fa-plus"></i>Add New </a>
@php
$heads = [
    'ID',
    'Name',
    'Slug',
    ['label' => 'Image', 'width' => 20],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

$config = [
    'data' => [
        [1, 'John Bender','test-one', '<img src="vendor/adminlte/dist/img/AdminLTELogo.png"/>', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],       
    ],
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp
@foreach ($data as $d)
{{$d->id}}
{{$d->name}}
{{$d->slug}}
{{$d->name}}
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
