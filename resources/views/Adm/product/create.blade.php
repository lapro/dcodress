@extends('adm/template')

@section('content')
<div class='box'>
	<div class='box-header'>
<h3 class='box-title'>Add New Product</h3>
</div>
<div class='box-body '>
	
	{!! Form::open(['method'=>'POST','url'=>'adm/products']) !!}

		@include('adm/product/form',['submitButtonText'=>'Add Item'])
	
	{!! Form::close() !!}

	@include('errors.list')

@stop