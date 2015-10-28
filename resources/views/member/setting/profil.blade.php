		<h3>Setting Profil : </h3>
		<small>Lengkapi informasi profil kamu untuk mempermudah transaksi penjualan dan pembelian di butik</small>
		<hr>
		{!! Form::open(['url'=>'settings/profil','class'=>'form-horizontal col-md-12']) !!}
			
		<div class="form-group">
			{!! Form::label('handphone','Handphone :') !!}
			{!! Form::text('handphone',@Auth::user()->profil->handphone,['class'=>'form-control',"required"]) !!}
		</div>

		<div class="form-group">
			{!! Form::label('province','Provinsi :') !!}
			{!! Form::select('province_id',array(),null,['class'=>'form-control',"required",'id'=>"province"]) !!}
			{!! Form::hidden('province_name',null,['id'=>"province_name"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('city','Kota :') !!}
			{!! Form::select('city_id',array(),null,['class'=>'form-control',"required",'id'=>"city"]) !!}
      {!! Form::hidden('city_name',null,['id'=>"city_name"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('address','Alamat :') !!}
			{!! Form::textarea('address',@Auth::user()->profil->address,['class'=>'form-control',"required",'id'=>"address","style"=>"height:60px"]) !!}
		</div>
			<div class="form-group">

			{!! Form::submit('Simpan',['class'=>'btn btn-primary pull-right']) !!}
		</div>
			{!! Form::close() !!}


	<script type="text/javascript">

	 function getProvince(){
	 	 $(".loading").show();
    	var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ongkir/province") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $('#province').html(data);
              $('#province').prepend('<option selected="true" value="" > - Pilih Provinsi - </option>');
              
              @if(!empty(Auth::user()->profil->province_id))
                      $("#province").val({!! Auth::user()->profil->province_id !!});
                      $("#province_name").val("{!! Auth::user()->profil->province_name !!}");
                      getCity($('#province').val(),true);
                      console.log($('#province').val());
              @endif

               $(".loading").hide();
        });
    }

    function getCity(province_id,session){
    	 $(".loading").show();
    	var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ongkir/city") !!}",
          data: { _token: token, province_id : province_id }
        })
        .done(function( data ) {

              $('#city').html(data);
              $('#city').prepend('<option selected="true" value="" > - Pilih Kota - </option>');
              @if(!empty(Auth::user()->profil->city_id))
              if(session==true){
                  $("#city").val({!! Auth::user()->profil->city_id !!});
                  $("#city_name").val("{!! Auth::user()->profil->city_name !!}");
              }
              @endif
               $(".loading").hide();
        });
    }



    $('#province').change(function(){
    	$('#province_name').val($('#province option:selected').text());
    	//alert($('#province_name').val());
    	getCity($('#province').val(),false);
    });

    $('#city').change(function(){
      $('#city_name').val($('#city option:selected').text());
      console.log($('#city_name').val());
      //alert($('#province_name').val());
    });


    getProvince();

	</script>
