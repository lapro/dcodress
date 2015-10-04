@extends('template')

@section('content')
 


<div class='col-md-5 col-lg-offset-1' style='border:1px solid #c0c0c0; padding:20px'>
	<h3 style='border-bottom:1px dashed black ' class='checkout-form-title'>Alamat Tujuan</h3>
	<br>
	<table class='table table-condensed' style='background: #f4f4f4'>
			<tr>
<td>Nama</td><td>:</td><td><?php echo(Session::get('invoice.user.u_name')) ?></td>			
			</tr>
			<tr>
<td>Email</td><td>:</td><td><?php echo(Session::get('invoice.user.u_email')) ?></td>
			</tr>
			<tr>
<td>Handphone</td><td>:</td><td><?php echo(Session::get('invoice.user.u_handphone')) ?></td>
			</tr>

		</table>
	<br>
	<div class='col-md-12 ' >
		

	{!! Form::open(['url'=>'checkout/destination','class'=>'form-horizontal']) !!}

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
			{!! Form::textarea('address',@Session::get('invoice.destination.address'),['class'=>'form-control',"required",'id'=>"address"]) !!}
		</div>
		
	<br>
		<div class="form-group">

			{!! Form::submit('Selanjutnya, Pembayaran >',['class'=>'btn btn-primary pull-right']) !!}
		</div>



	{!! Form::close() !!}
</div>
</div>

<div class='col-md-4 col-lg-offset-1' style='border:1px solid #c0c0c0; padding:20px;'>

	<div id='dc-basket-checkout'> loading ... </div>

</div>



@stop

@section('footer')

@include('checkout/checkout-js');

<script type="text/javascript">

    function getProvince(){
    	var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ongkir/province") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $('#province').html(data);
              $('#province').prepend('<option selected="true" value="" > - Pilih Provinsi - </option>');
              
              @if(Session::has("invoice.destination"))
                      $("#province").val({!! Session::get('invoice.destination.province_id')!!});
                      getCity($('#province').val(),true);
                      console.log($('#province').val());
              @endif

        });
    }

    function getCity(province_id,session){
    	var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ongkir/city") !!}",
          data: { _token: token, province_id : province_id }
        })
        .done(function( data ) {

              $('#city').html(data);
              $('#city').prepend('<option selected="true" value="" > - Pilih Kota - </option>');
              @if(Session::has('invoice.destination'))
              if(session==true){
                  $("#city").val({!! Session::get('invoice.destination.city_id') !!});
              }
              @endif
        });
    }

    function getCost(destination){

        var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ongkir/cost") !!}",
          data: { _token: token, city : destination }
        })
        .done(function( data ) {
              //alert(data);
              //$('#city').html(data);
              getBasket();              
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