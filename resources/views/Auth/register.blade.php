@extends('template')

@section('header')
 <link href="{{ asset('assets/bootstrap/css/bootstrap-social.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class='row'>
	<div class='col-md-5 col-md-offset-4'  style='border:1px solid #c0c0c0; padding:20px'>
			<h3>Form Registrasi</h3>
			<hr>
			{!! Form::open(['url'=>'register','class'=>'form-horizontal col-md-12']) !!}
			<div class="form-group">
					{!! Form::label('email','Nama Lengkap :') !!}
					{!! Form::input('text','name','',['class'=>'form-control',"required"]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email','Email :') !!}
					{!! Form::input('email','email','',['class'=>'form-control',"required"]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email','Password :') !!}
					{!! Form::input('password','password','',['class'=>'form-control',"required"]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password_conf','Konfirmasi Password :') !!}
					{!! Form::input('password','password_confirmation','',['class'=>'form-control',"required"]) !!}
				</div>
					{!! Form::submit('Daftar',['class'=>'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}
	<div class='clearfix'></div>
	<hr>
	<h3>Biar nggak repot !</h3>
	<a href='{{url("auth/social-login/facebook")}}' class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Login dengan Facebook
                </a>
                
                 <a href='{{url("auth/login/google")}}' class="btn btn-block btn-social btn-google">
                    <i class="fa fa-google"></i> Login dengan Google
                </a>
	</div>
</div>

@stop