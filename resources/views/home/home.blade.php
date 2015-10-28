@extends('template')

@section('content')

@if(Auth::check())

@if(count(Auth::user()->profil)==0)
<div class='alert alert-danger'>
    Satu langkah lagi untuk melengkapi informasi anda <a href="{!! url('settings') !!}">disni </a>.  
</div>
@endif

<div class='col-md-12'>
    <h5 style='color:#c0c0c0 ;font-family: "AvantGarde", Arial, Sans-serif;'>OUTFIT <span style='color:#000'>TERBARU :</span> </h5>
    <div class='clearfix'></div>
    <div class='row' id='new-item'>
        
    </div>
    <br>
     <center><a href='#' class='btn btn-primary'><i class='fa fa-search'></i> Yang lain ~</a> 
      </center>
    <div class='clearfix'></div>
</div>
<div class='clearfix'></div>
<br>
<div class='col-md-12'>
    <h5 style='color:black ;font-family: "AvantGarde", Arial, Sans-serif;'>Butik :</h5>
    <div class='clearfix'></div>
    <div class='row' id='butik'>
        
    </div>
    <br>
    <center><a href='{!! url("butik") !!}' class='btn btn-primary'><i class='fa fa-search'></i> Yang lain ~</a> 
      <a href='{!! url("butik/random")!!}' class='btn btn-danger'><i class='fa fa-random'></i> Random Outfit ~</a></center>
    <div class='clearfix'></div>
</div>
<div class='clearfix'></div>
<br>

<?php /*
ambil data dari Instagram berdasarkan hastag
<div class='col-md-12'>
    <h5 style='color:black ;font-family: "AvantGarde", Arial, Sans-serif;'>Instagram :</h5>
    <div class='clearfix'></div>
    <div class='row' id='instagram'>
        
    </div>
    <br>
    <div class='clearfix'></div>
</div>
*/ ?>

<div class='clearfix'></div>
@stop

@section("footer")
<script type="text/javascript">
	
	function getTerbaru(){
	var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ajax/terbaru") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $("#new-item").html(data);
        });
    }
    
    /*
    function getInstagram(){
    var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ajax/instagram") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $("#instagram").html(data);
        });
    }
    */

    function getButik(){
    var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("ajax/butik") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $("#butik").html(data);
        });
    }


      getTerbaru();
      //getInstagram();
      getButik();

</script>
@else <!-- end login cek-->

<div class='col-md-12'>
  <br>

<div class='col-md-8 hidden-xs'>
<center>
<br><br><br><h1 style="">Bagikan dan Cari <br>Inspirasi Outfit Kamu <br> Disini </h1>
</center>
</div>
<div class='col-md-4'>
@include('auth.register_form')
</div>
  <br><Br>
</div>

@endif <!-- end login cek-->

@stop