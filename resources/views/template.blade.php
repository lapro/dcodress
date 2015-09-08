<!DOCTYPE html>
<html>
<head>
	<title> Share, get an exclusive fashion for you | dcodress</title>

	{!!Html::style('assets/bootstrap/css/bootstrap.css')!!}
	{!!Html::script('assets/jquery/jquery-2.1.4.min.js')!!}
  {!!Html::style('assets/style.css')!!}

</head>
<body>

	<div class="container">
  
<div style=' padding-bottom:5px'>
<ul class="nav nav-pills" >
  <li role="presentation" class=""><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
</ul>
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
        <li class='' ><a href="#" >Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->   
    </nav>
<br>
<!-- Carousel
    ================================================== -->

@yield('content')


<hr style='margin:5px'>
<footer style='margin-left:10px'>

Copyright - 2015 dcodress.com 

</footer>

<div id='myModal' class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <input type="checkbox" > ok, I already know, don't show again ! 
        <button type="button" class="btn btn-default" data-dismiss="modal" style='margin-left:10px'><i class='fa fa-close'></i> Close</button>
        
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  
  $(window).load(function(){

    $('#myModal').modal("show");
  });

</script>

{!!Html::script('assets/bootstrap/js/bootstrap.min.js')!!}

@yield('footer')
</body>
</html>