	<link href="{{ asset('assets/bootstrap/css/bootstrap-social.css') }}" rel="stylesheet">
			<center>
			<a href='{{url("login/facebook")}}' class="btn  btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Masuk Dengan Facebook
            </a>
        </center>
			<div class="hr">
            <div class="inner">atau</div>
        	</div>
        	<div class='col-md-12' >
			{!! Form::open(['url'=>'login','class'=>'form-horizontal col-md-12']) !!}
				<div class="form-group">
					{!! Form::label('email','Email :') !!}
					{!! Form::input('email','email','',['class'=>'form-control',"required"]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email','Password :') !!}
					{!! Form::input('password','password','',['class'=>'form-control',"required"]) !!}
				</div>
					{!! Form::submit('Masuk',['class'=>'btn btn-danger pull-right']) !!}
					
			{!! Form::close() !!}
		</div>
		<div class='clearfix'></div>
		<br> <br>
		<center>
			Belum punya akun? <a href="{!! url('register') !!}"> daftar </a>
		</center>	
	<div class='clearfix'></div>
