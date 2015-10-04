
		<div class="form-group">
			{!! Form::label('name','Nama Produk :') !!}
			{!! Form::text('name',@$products->name,['class'=>'form-control','required']) !!}
		</div>
		<div class="form-group">
                    {!! Form::label('email','Kategori :') !!}
                    {!! Form::select('category',$cat,'',['class'=>'form-control',"required"]) !!}
                </div>
		<div class="form-group">
			<label> Harga Awal :</label>
			{!! Form::input('number','original_price',(isset($products->original_price)) ? $products->original_price : 0,['class'=>'form-control','required']) !!}
		</div>
		<div class="form-group">
			
			<label> Harga Jual :</label>
			{!! Form::input('number','price',(isset($products->price)) ? $products->price : 0 ,['class'=>'form-control','required']) !!}
		</div>
		<div class="form-group">
			<label> Berat produk :</label>
			{!! Form::input('number','weight',0,['class'=>'form-control','required','step'=>'any']) !!}
		</div>
		<hr>
		<div class="form-group">
			<label> Jenis produk :</label><br>
			{!! Form::radio("status",1,true) !!} Hanya 1 Set (Cocok untuk promosi dan pengenalan produk) <br>
			
			{!! Form::radio("status",2) !!} Stok Banyak (Penjualan dalam skala besar)
		</div>
		<hr>
		<div class="form-group">
			{!! Form::label('description','Deskripsi :') !!}
			{!! Form::textarea('description',@$products->description,['class'=>'form-control','required',"style"=>"height:50px"]) !!}
		</div>

		@if($do == "create")
			<div class="form-group">
			{!! Form::label('Gambar','Gambar :') !!}

					<input type="file" id="files" name="files[]" multiple />
					<output id="list"></output>
					<span> *Gunakan ctrl untuk multiple select </span>
			</div>
		@endif
		

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
			{!! Form::submit("Simpan",['class'=>'btn btn-primary pull-right']) !!}
		</div>

<style>
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
</style>


		<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
	
	