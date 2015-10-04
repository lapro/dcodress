@extends('adm/template')

@section('content')
<div class='row'>
{!! Form::open(['method'=>'POST','url'=>'adm/products']) !!}
<div class='col-md-6'>
<div class='box '>
	<div class='box-header'>
<h3 class='box-title'>Add New Product</h3>
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