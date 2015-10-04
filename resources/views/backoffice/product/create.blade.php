@extends('backoffice.template')

@section('title')
	Dashboard
@stop

@section('breadcrumb')
<li><a href="#">
	<i class="fa fa-dashboard"></i> Home</a>
</li>
<li class="active">Dashboard</li>
@stop

@section('content')



<div class='box'>
<div class='box-header'>

</div>
<div class='box-body'>
<div class='col-md-6 col-md-offset-3'>
{!! Form::open(['method'=>'POST','url'=>'backoffice/products','files'=>true]) !!}

@include('backoffice/product/form',['do'=>'create'])
	
@include('errors.list')

{!! Form::close() !!}
</div>
</div>
</div>


@stop