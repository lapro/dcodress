@extends('adm/template')

@section('content')
<div class='row'>
	{!! Form::model($products, ['method'=>'PATCH','action'=>  ['Adm\ProductsController@update',$products->id]]) !!}
<div class='col-md-6'>
<div class='box '>
	<div class='box-header'>
<h3 class='box-title'>Edit Product</h3>
</div>
<div class='box-body '>
	


	@include('adm/product/form',['submitButtonText'=>'Add Item'])
	
	@include('errors.list')
	
</div>
{!! Form::close() !!}
</div>

</div> <!-- end col-md-6 -->
</div>
@stop