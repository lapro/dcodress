<!DOCTYPE html>
<html>
<head>
	<title> Share, get an exclusive fashion for you | dcodress</title>

	{!!Html::style('assets/bootstrap/css/bootstrap.css')!!}
	{!!Html::script('assets/jquery/jquery-2.1.4.min.js')!!}
  <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  {!!Html::style('assets/style.css')!!}

<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="{!! asset('assets/owl-carousel/owl.carousel.css')!!}">
 
<!-- Default Theme -->
<link rel="stylesheet" href="{!! asset('assets/owl-carousel/owl.theme.css')!!}">

<!-- Default Theme -->
<link rel="stylesheet" href="{!! asset('assets/owl-carousel/owl.transitions.css')!!}">

  @yield('header')

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3KcBS9zQKuLPrAIODDlWpZQlqvZTG9vl";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '691323724302251',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<div class="container" style=" background:#fff;">
  
<div style=' padding-bottom:5px' class='row '>
<div class='col-xs-6'>
<ul class="nav nav-pills  " >
  <li role="presentation" class=""><a href="#">ReadMe</a></li>
  <li role="presentation"><a href="#">Event</a></li>
  <li role="presentation"><a href="#">Pesan</a></li>
</ul>
</div>
<div class='col-xs-6 '>
<ul class="nav nav-pills pull-right" >
  
  <li role="presentation"><a href="{{ url('cart') }}" data-toggle='modal' data-target='#remote-modal-sm'><i class='fa fa-shopping-cart'></i> <span class="badge">{!! Cart::count() !!}</span></a></li>

  @if(Auth::check())
  <li role="presentation"><a href="{{ url('auth/logout') }}" ><i class='fa fa-sign-out'></i> Logout</a></li>
  @else
  <li role="presentation"><a href="{{ url('login') }}" data-toggle="modal" data-target="#remote-modal-sm"><i class='fa fa-sign-in'></i> Login</a></li>
  @endif
</ul>
</div>
</div>


  <nav class="navbar navbar-inverse shadow-arch-edges" style="height:60px;background-color:oldlace; border:none">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:black;" href="#"><img src="{{asset('img/logo.png')}}"></a>

        </div>  
         <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style='padding-top:5px;padding-right:30px'>
      <ul class="nav navbar-nav navbar-right" style='style="height:60px;'>
        <li class='' style='font-weight: bold; '><a href="{!! url("butik") !!}" ><span style='color:red;text-decoration:underline;'> BELANJA </span>  DI BUTIK</a></li>

@if(Auth::check())
@if(Auth::user()->hasRole("Bos") OR Auth::user()->hasRole("Supplier"))

        <li class='' ><a href="{!! url("backoffice") !!}" class=''>BACKOFFICE </a></li>
@endif
@endif
        <li class='' ><a href="{!! url("/") !!}" class=''>HOME </a></li>
      </ul>
    </div><!-- /.navbar-collapse -->   
    </nav>
<br>
<!-- Carousel
    ================================================== -->

@yield('content')


<div class='clearfix'></div>
<footer >
<div class='footer' style='margin:40px 10px 10px 10px; padding:10px'>
Copyright - 2015 dcodress.com 
</div>

</footer>

<div id='myModal' class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <input type="checkbox" id='dont_show_again'> ok, saya sudah tahu, jangan tampilkan lagi ! 
        <button type="button" class="btn btn-default" data-dismiss="modal" style='margin-left:10px'><i class='fa fa-close'></i> Close</button>
        
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="remote-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
              <div class="modal-dialog " >
                <div class="modal-content" style='border-top:3px solid red'>
                  loading...
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
{!!Html::script('assets/bootstrap/js/bootstrap.min.js')!!}
{!!Html::script('assets/jquery-cookies/js.cookie.js')!!}
<!-- Include js plugin -->
<script src="{!! asset('assets/owl-carousel/owl.carousel.js') !!}"></script>

<script type="text/javascript">
  /* get variable from URL */
  $.urlParam = function(name){
    var results = new RegExp('[\#&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
  }

  $(window).load(function(){
    var share = decodeURIComponent($.urlParam('share'));
    if(share !='true' && Cookies.get('welcome')==null){
      $('#myModal').modal("show");
    }
  });


  $(document.body).on('hidden.bs.modal', function ()
  {
    $('#remote-modal-sm .modal-content').html("<div class='modal-body'>"+"loading"+"</div>");
    $('#remote-modal-sm').removeData('bs.modal');
  });

  $(document).ready(function(){
    $('#dont_show_again').click(function(){
        Cookies.set('welcome', 'false', { expires: 30 });
    });
  });

</script>



@yield('footer')
</body>
</html>