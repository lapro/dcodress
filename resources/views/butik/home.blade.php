@extends('template')

@section('content')

<div class='col-md-12'>
    <h5 style='color:black ;font-family: "AvantGarde", Arial, Sans-serif;'>Butik :</h5>
    <div class='clearfix'></div>
    <div class='row' id='butik'>
        
    </div>
    <br>
    <center><a href='#' class='btn btn-primary'><i class='fa fa-search'></i> Yang lain ~</a> 
      <a href='{!! url("butik/random")!!}' class='btn btn-danger'><i class='fa fa-random'></i> Random ~</a></center>
    <div class='clearfix'></div>
</div>
@stop
@section("footer")
<script type="text/javascript">
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
 getButik();

</script>
@stop