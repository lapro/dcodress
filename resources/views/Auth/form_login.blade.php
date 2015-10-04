	<link href="{{ asset('assets/bootstrap/css/bootstrap-social.css') }}" rel="stylesheet">

	<h3>Login Form</h3>
			<hr>
			{!! Form::open(['url'=>'login','class'=>'form-horizontal col-md-12']) !!}
				<div class="form-group">
					{!! Form::label('email','Email :') !!}
					{!! Form::input('email','email','',['class'=>'form-control',"required"]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email','Password :') !!}
					{!! Form::input('password','password','',['class'=>'form-control',"required"]) !!}
				</div>
					{!! Form::submit('Masuk',['class'=>'btn btn-primary pull-right']) !!}
					<a href="{!! url('register') !!}" class='btn btn-link pull-right'> Daftar</a>
			{!! Form::close() !!}
	<div class='clearfix'></div>
	<hr>
	<h3>Social Login</h3>
	<a href='{{url("auth/social-login/facebook")}}' class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Login dengan Facebook
                </a>
                
                 <a href='{{url("auth/login/google")}}' class="btn btn-block btn-social btn-google">
                    <i class="fa fa-google"></i> Login dengan Google
                </a>