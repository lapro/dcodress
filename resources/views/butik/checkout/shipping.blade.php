@extends('template')

@section('content')
<div style='border:1px dashed #c0c0c0; padding:10px'>
<center>
<ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-current">PENGIRIMAN</li>
    <li class="progtrckr-todo">KONFIRMASI</li>
    <li class="progtrckr-todo">PEMBAYARAN</li>
</ol>
</center>
</div>
<br>
<br>


<div class='col-md-12'>

<div class='col-md-9 col-md-offset-2'>
	
</div>

<div class='col-md-6 col-md-offset-3'style='border:1px solid black'>

<div class='col-md-12' >
	<div class="loading" style='display:none'>Loading&#8230;</div>
<center><h3>DATA PELANGGAN</h3></center><hr>
<div class='alert alert-warning'>
	<center>
Jika kamu sudah terdaftar silahkan login disini.
	</center>
</div>
	{!! Form::open(['url'=>'butik/checkout/pengiriman','class'=>'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('nama','Nama :') !!}
			{!! Form::text('name',  (!empty(Auth::user()->name)) ? Auth::user()->name : (Session::has("invoice.name")) ? Session::get("invoice.name") : "",['class'=>'form-control',"required"]) !!}
		</div>
		<div class="form-group"> 
			{!! Form::label('email','Email :') !!}
			{!! Form::text('email', (!empty(Auth::user()->email)) ? Auth::user()->email : (Session::has("invoice.email")) ? Session::get("invoice.email") : "",['class'=>'form-control',"required"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('handphone','Handphone :') !!}
			{!! Form::text('handphone',(!empty(Auth::user()->handphone)) ? Auth::user()->handphone : (Session::has("invoice.handphone")) ? Session::get("invoice.handphone") :  "",['class'=>'form-control',"required"]) !!}
		</div>

		<div class="form-group">
			{!! Form::label('province','Provinsi :') !!}
			{!! Form::select('province_id',array(),null,['class'=>'form-control',"required",'id'=>"province"]) !!}
			{!! Form::hidden('province',null,['id'=>"province_name"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('city','Kota :') !!}
			{!! Form::select('city_id',array(),null,['class'=>'form-control',"required",'id'=>"city"]) !!}
      {!! Form::hidden('city',null,['id'=>"city_name"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('address','Alamat Pengiriman :') !!}
			{!! Form::textarea('address',@Session::get('invoice.address'),['class'=>'form-control',"required",'id'=>"address","style"=>"height:60px"]) !!}
		</div>
		
	<br>
		<div class="form-group">

			{!! Form::submit('Selanjutnya',['class'=>'btn btn-primary pull-right']) !!}
		</div>

	{!! Form::close() !!}

</div>
</div>

</div>


@stop

@section('footer')
	
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
              
              @if(Session::has("invoice"))
                      $("#province").val({!! Session::get('invoice.province_id')!!});
                      $("#province_name").val("{!! Session::get('invoice.province')!!}");
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
              @if(Session::has('invoice'))
              if(session==true){
                  $("#city").val({!! Session::get('invoice.city_id') !!});
                  $("#city_name").val("{!! Session::get('invoice.city') !!}");
              }
              @endif
               $(".loading").hide();
        });
    }

    function getCost(destination){
    	$(".loading").show();
        var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ongkir/cost") !!}",
          data: { _token: token, city : destination }
        })
        .done(function( data ) {
              //alert(data);
              //$('#city').html(data);
              //getBasket(); 
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
      //alert($('#province_name').val());
      getCost($('#city').val());
    });


    getProvince();

	</script>
@stop