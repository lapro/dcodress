@extends('template')



@section('content')
	<div class='row'>
		
	<div class='col-md-5 col-md-offset-4'  style='border:1px solid #c0c0c0; padding:20px'><br>
			@include('auth.register_form')
	</div>
</div>

@stop