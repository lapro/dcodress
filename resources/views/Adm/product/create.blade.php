@extends('adm/template')

@section('content')
<h1>Add New Product</h1>
<hr/>

	{!! Form::open(['method'=>'POST','url'=>'adm/products']) !!}

		@include('adm/product/form',['submitButtonText'=>'Add Item'])
	
	{!! Form::close() !!}

	@include('errors.list')

@stop
