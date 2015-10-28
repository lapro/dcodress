<!DOCTYPE html>
<html >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title> Share, get an exclusive fashion for you | dcodress</title>

	{!!Html::style('assets/bootstrap/css/bootstrap.css')!!}
	{!!Html::script('assets/jquery/jquery-2.1.4.min.js')!!}
  {!!Html::script('assets/angularjs/angular.min.js')!!}

  <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  {!!Html::style('assets/style.css')!!}
  {!!Html::style('assets/loading.css')!!}
  {!!Html::style('assets/stepbystep.css')!!}

  <!-- Selectize-->
  
  {!!Html::style('assets/selectize/css/selectize.css')!!}
  {!!Html::style('assets/selectize/css/selectize.default.css')!!}


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

<div class="loading mainloading" style='display:none'>Loading&#8230;</div>

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
  
<div style=' padding-bottom:4px' class='row '>
<div class='col-xs-4'>
<ul class="nav nav-pills  " >

</ul>
</div>
<div class='col-xs-12 '>
<ul class="nav nav-pills pull-right" >


  <li role="presentation"><a href="#" data-toggle='modal' data-target='#modal-cart'><i class='fa fa-shopping-cart'></i> <span class="badge" id='jumlah-cart'>{!! Cart::count() !!}</span></a></li>

@if(!Auth::check()) 
   

  <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><i class='fa fa-check'></i> <span class='hidden-xs hidden-md'>Cek Status Pesanan</span></a>
            <div class="dropdown-menu" style="padding:17px;width:300px">
              <form class="form" id="formLogin" action="{!! url('cek-pesanan') !!}" method="GET"> 
                <div class="form-group">
                {!! Form::label('email','Email :') !!}
                <input name="email" id="username" class='form-control' type="text" placeholder="Email"> 
              </div>
              <div class="form-group">
                {!! Form::label('kode','Kode :') !!}
                <input name="kode" id="password" class='form-control' type="text" placeholder="Kode Pesanan">
              </div>
              <div class="form-group">
                <button type="submit" id="btnLogin" class="btn">Periksa</button>
              </div>
              </form>
            </div>
  </li>
  @endif

  @if(Auth::check())
   <li role="presentation"><a href="{!! url('post') !!}" ><i class='fa fa-pencil'></i> Submit</a></li>
  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class='fa fa-user'></i> {!! Auth::user()->name !!} <span class="caret"></span></a>
          <ul class="dropdown-menu">
 <li role="presentation" class=""><a href="#"><i class='fa fa-money'></i> <span class=''>Transaksi</span></a></li>
  <li role="presentation" class=""><a href="#"><i class='fa fa-list'></i> <span class=''>Katalog</span></a></li>
         
  <li role="presentation"><a href="{{ url('settings') }}" ><i class='fa fa-gear'></i> <span class=''>Setting</span> </a></li>
   
  <li role="presentation"><a href="{{ url('logout') }}" ><i class='fa fa-sign-out'></i> <span class='hidden-xs hidden-md'>Logout</span> </a></li>  
         </ul>
        </li>
   
  @else

  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class='fa fa-user'></i>  Login<span class="caret"></span></a>
          <ul class="dropdown-menu">
 <li role="presentation"><a href="{{ url('login') }}" data-toggle="modal" data-target="#remote-modal-login "><i class='fa fa-sign-in'></i> Login</a></li>
    <li role="presentation"><a href="{{ url('register') }}" ><i class='fa fa-user'></i> Daftar</a></li>
         </ul>
        </li>
  
  @endif
</ul>
</div>
</div>


  <nav class="navbar navbar-inverse shadow-arch-edges" style="height:60px;background-color:oldlace; border:none">
        <div class="navbar-header hidden-xs hidden-md">
          <!--
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          -->
          <a class="navbar-brand" style="color:black;" href="{!! url() !!}"><img src="{{asset('img/logo.png')}}"></a>
          
        </div>  
         <!-- Collect the nav links, forms, and other content for toggling -->
    <!--
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style='padding-top:5px;padding-right:30px;z-index:9999;background:#fff;'>
      -->
      <div class='hidden-xs hidden-md' style='padding-top:5px;padding-right:30px;'>
      <ul class="nav navbar-nav navbar-right" style='style="height:60px;'>
        <li class='' style='font-weight: bold; '><a href="{!! url("butik") !!}" ><span style='color:red;text-decoration:underline;'> BELANJA </span>  DI BUTIK</a></li>
        <li class='' style='font-weight: bold;'><a href="{!! url("/") !!}" class=''>HOME </a></li>
      </ul>
    </div>


<!-- nav mobile-->
    <ul class="nav nav-pills hidden-lg mobile-nav" style='padding:10px'> <li role="presentation" style="">
        <a class="navbar-brand" style="color:black;margin-top:-10px;margin-left:-10px" href="#"><img src="{{asset('img/logo.png')}}" ></a>
      </li>

      <li class='' style='font-weight: bold; '><a href="{!! url("butik") !!}" ><span style='color:red;text-decoration:underline;'> BELANJA </span> </a></li>
        <li class='' style='font-weight: bold;'><a href="{!! url("/") !!}" class=''><i class="fa fa-home"></i> </a></li>
    </ul>
      <!--
    </div><!-- /.navbar-collapse 
  -->   
    </nav>
<br>
<!-- Carousel
    ================================================== -->
<div style='min-height: 500px'>
@yield('content')

</div>
<div class='clearfix'></div>
<br><br>
<footer>
<div class='row' style='background:black;color:#fff;padding-top:20px'>
<div class='col-md-2 col-xs-6 footer-grid' >
  <ul class='nav nav-pills nav-stacked footer-link' style='margin:10px'>
    <li><a href="#"> Home</a></li>
    <li><a href="{!! url('c/rules')!!}"> Rules </a></li>
    <li><a href="#"> Belanja Di Butik</a></li>
  </ul>
</div>
<div class='col-md-2 col-xs-6 footer-grid' >
  <ul class='nav nav-pills nav-stacked footer-link' style='margin:10px'>
    <li><a href="#"> About </a></li>
    <li><a href="#"> Contact</a></li>
    <li><a href="#"> Team</a></li>
    @if(Auth::check())
          @if(Auth::user()->hasRole("Bos") OR Auth::user()->hasRole("Supplier"))

                  <li class='' style='font-weight: bold;'><a href="{!! url("backoffice") !!}" class=''>
                    <i class='fa fa-user-secret'></i>
                   BACKOFFICE</a></li>
          @endif

          @endif
  </ul>
</div>
<div class='clearfix hidden-md hidden-lg'></div>
<div class='col-md-4 col-xs-6 footer-grid' style='color:#92999f'>
<br>

<a href="https://play.google.com/store/search?q=pub:dcodress.com">
  <img alt="Get it on Google Play"
       src="https://developer.android.com/images/brand/en_generic_rgb_wo_45.png" />
</a><br><br>
<a class="image" href="https://itunes.apple.com/us/app/blackhawk-v1.3.0/id422091119?mt=8&amp;uo=4" target="itunes_store" style="display:inline-block;overflow:hidden;background:url(http://linkmaker.itunes.apple.com/htmlResources/assets/images/web/linkmaker/badge_appstore-lrg.png) no-repeat;width:135px;height:40px;@media only screen{background-image:url(http://linkmaker.itunes.apple.com/htmlResources/assets/images/web/linkmaker/badge_appstore-lrg.svg);}"></a>

</div>
<div class='col-md-4 col-xs-6 footer-grid'>

</div>
<div class='clearfix'></div>
<br>
<div class='footer col-md-12' style='text-align:center;height:40px;padding:10px;color:#92999f'>
Copyright @ 2015 dcodress.com 
</div>
</div>
 </footer>




<div class="modal fade" id="remote-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
              <div class="modal-dialog " >
                <div class="modal-content" style='border-top:3px solid red'>
                  loading...
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>

<div class="modal fade" id="remote-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
              <div class="modal-dialog modal-md" >
                <div class="modal-content" style='border-top:3px solid red'>
                  loading...
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>

            <!-- modal CART -->

{!!Html::script('assets/bootstrap/js/bootstrap.min.js')!!}
{!!Html::script('assets/jquery-cookies/js.cookie.js')!!}
{!!Html::script('assets/selectize/js/standalone/selectize.min.js')!!}
<!-- Include js plugin -->
<script src="{!! asset('assets/owl-carousel/owl.carousel.js') !!}"></script>

<script type="text/javascript">

  $('.dropdown input, .dropdown label').click(function(e) {
    e.stopPropagation();
  });

  $(document.body).on('hidden.bs.modal', function ()
  {
    $('#remote-modal-sm .modal-content').html("<div class='modal-body'>"+"loading"+"</div>");
    $('#remote-modal-sm').removeData('bs.modal');
    $('#remote-modal-login .modal-content').html("<div class='modal-body'>"+"loading"+"</div>");
    $('#remote-modal-login').removeData('bs.modal');
  });




</script>



@yield('footer')

@include('butik.cart.index')

</body>
</html>