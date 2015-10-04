
 <link href="{{ asset('assets/bootstrap/css/bootstrap-social.css') }}" rel="stylesheet">

 <button style='margin:5px 10px 0px 0px' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
 <div class='clearfix'></div>
<div class='modal-body'>
<div class='row' >

     <div class="col-md-6 col-md-offset-3" style=' text-align:center'>
                
                
          <span style='font-size: 14pt;font-weight:bold'>Bagikan : <br></span>
                <a id='fb-share-button' class="btn btn-social btn-facebook 
                <?php echo (Auth::user()->haveShareProduct('facebook',$slug)) ? "disabled" : ""?>
                ">
                    <i class="fa fa-facebook"></i> Facebook
                </a>
                
                 <a href='{{url("auth/login/google")}}' class="btn btn-social btn-google">
                    <i class="fa fa-google"></i> Google
                </a>
                
            </div>

</div>
                  </div>
                 

                 


<script type="text/javascript">

$(document).ready(function(){

function sharingDiscount(provider){
  var token = "<?php echo csrf_token(); ?>";
  $.ajax({
    method: "POST",
    url: "{!! url("share/sharingDiscount/$slug") !!}"+"/"+provider,
    data: { _token: token }
  })
  .done(function( msg ) {
    alert( "Data Saved: " + msg );
    location.reload();
  });
}

$('#fb-share-button').click(function(e){

  //FB.ui({
  //method: 'share',
  // href: 'lapro.id',
  //}, function(response){
  // Debug response (optional)
  //console.log(response);
  //if (response && !response.error_message) {
      
      sharingDiscount('facebook');
    //} else {
      //alert('Error while posting.');
    //}
  //});
  });


});


</script>