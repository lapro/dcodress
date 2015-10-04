@extends('template')

@section('content')
 


<div class='col-md-5 col-lg-offset-1' style='border:1px solid #c0c0c0; padding:20px'>
	<h3 style='border-bottom:1px dashed black ' class='checkout-form-title'>Data Pribadi</h3>
	<br>
	<div class='col-md-12 ' >

	{!! Form::open(['url'=>'checkout/user','class'=>'form-horizontal']) !!}

		<div class="form-group">
			{!! Form::label('nama','Nama :') !!}
			{!! Form::text('u_name',@Auth::user()->name,['class'=>'form-control',"required"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email :') !!}
			{!! Form::text('u_email',@Auth::user()->email,['class'=>'form-control',"required"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('handphone','Handphone :') !!}
			{!! Form::text('u_handphone',@Auth::user()->profil->handphone,['class'=>'form-control',"required"]) !!}
		</div>
	<br>
		<div class="form-group">

			{!! Form::submit('Selanjutnya, Alamat Pengiriman ->',['class'=>'btn btn-primary pull-right']) !!}
		</div>



	{!! Form::close() !!}
</div>
</div>

<div class='col-md-4 col-lg-offset-1' style='border:1px solid #c0c0c0; padding:20px;'>

	<div id='dc-basket-checkout'> loading ... </div>

</div>



@stop

@section('footer')
@include("checkout/checkout-js")
@stop