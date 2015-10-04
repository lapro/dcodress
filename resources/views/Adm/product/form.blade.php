
		<div class="form-group">
			{!! Form::label('name','Name :') !!}
			{!! Form::text('name',@$products->name,['class'=>'form-control','required']) !!}
		</div>
		<div class="form-group">
			<label> Capital Price<small> (harga modal)</small> :</label>
			{!! Form::input('number','capital_price',@$products->capital_price,['class'=>'form-control','required']) !!}
		</div>
		<div class="form-group">
			
			<label> Original Price<small> (harga jual)</small> :</label>
			{!! Form::input('number','original_price',@$products->original_price,['class'=>'form-control','required']) !!}
		</div>
		
		<div class="form-group">
			<label> Minimum Price<small> (harga minimun jual)</small> :</label>
			{!! Form::input('number','min_price',0,['class'=>'form-control','required']) !!}
		</div>
		<div class="form-group">
			<label> Weight :</label>
			{!! Form::input('number','weight',0,['class'=>'form-control','required','step'=>'any']) !!}
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
		<div class="form-group">
			{!! Form::label('slug','Slug :') !!}
			{!! Form::text('slug',@$products->slug, ['id'=>'slug', 'class'=>'form-control'])!!}
		</div>
		@endif

<div class='clearfix'></div>
		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-right']) !!}
		</div>
	
	