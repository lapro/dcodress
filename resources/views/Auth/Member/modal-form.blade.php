
 <link href="{{ asset('assets/bootstrap/css/bootstrap-social.css') }}" rel="stylesheet">

 <button style='margin:5px 10px 0px 0px' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
 <div class='clearfix'></div>
<div class='modal-body'>
<div class='row' >

     <div class="col-md-6 col-md-offset-3" style=' text-align:center'>
                
                <p> {{ $caption }} </p>

                <a href='{{url("auth/social-login/facebook")}}' class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Login dengan Facebook
                </a>
                
                 <a href='{{url("auth/login/google")}}' class="btn btn-block btn-social btn-google">
                    <i class="fa fa-google"></i> Login dengan Google
                </a>
                
            </div>

</div>
                  </div>
                 

                 
