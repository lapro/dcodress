<center>
			<a href='{{url("login/facebook")}}' class="btn  btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Masuk Dengan Facebook
            </a>
        </center>
			<div class="hr">
            <div class="inner">atau</div>
        	</div>

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
					{!! Form::submit('Daftar',['class'=>'btn btn-danger pull-right']) !!}
			{!! Form::close() !!}
	<div class='clearfix'></div>

	<center>
			Sudah punya akun? <a href="{!! url('register') !!}"> login </a>
		</center>	