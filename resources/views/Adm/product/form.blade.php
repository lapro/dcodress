		<div class="form-group">
			{!! Form::label('name','Name :') !!}
			{!! Form::text('name',@$products->name,['class'=>'form-control','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('original_price','Original Price :') !!}
			{!! Form::input('number','original_price',@$products->original_price,['class'=>'form-control','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Description :') !!}
			{!! Form::textarea('description',@$products->description,['class'=>'form-control','required']) !!}
		</div>

		@if($do=='edit')
		<div class="form-group">
			{!! Form::label('price','Price :') !!}
			{!! Form::input('number','price',@$products->price,['class'=>'form-control','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('status','Status :') !!}
			{!! Form::select('status',['available'=>'available','sold'=>'sold'],@$products->status, ['id'=>'products', 'class'=>'form-control'])!!}
		</div>
		@endif

		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
		</div>
	
	