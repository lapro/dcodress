@extends('adm/template')

@section('content')
	<h1>Edit Product: {!! $products->name !!} </h1>
	{!! Form::model($products, ['method'=>'PATCH','action'=>  ['Adm\ProductsController@update',$products->id]]) !!}
		
		@include('adm/product/form',['submitButtonText'=>'Change Item'])
	
	{!! Form::close() !!}

	@include('errors.list')
@stop