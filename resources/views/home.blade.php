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
    <div class="row" >
    	<div class="col-md-9">
   
        <div id="myCarousel" class="col-md-12 carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      {!! Html::image('product/sunday-outfit.jpg','First Picture', array('class'=>'rcorners2 ','style'=>'width:100%; height:450px;','alt'=>'0')) !!}
    </div>

    <div class="item">

      {!! Html::image('assets/gallery/lemari-pakaian-jati-minimalis.jpg','Second Picture', array('class'=>'rcorners2 ','style'=>'width:100%; height:450px;','alt'=>'1')) !!}

    </div>
</div>

      </div>

    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            
                <div class="panel-body" style="min-height:275px;">
                <h4>Deskripsi:</h4><br>

                Nama Set :<span style="color:orange;">Sunday Outfit</span><br>
               Kelengkapan :
                <h5 style="color:firebrick;">
                  <ul>
                    <li class='li'>White Cardigan (Shord Sleeve)</li>
                    <li class='li'>Purple Tanktop</li>
                    <li class='li'>Black Jeans</li>
                  </ul>
                </h5>
                
                </div>
                <div style='background:url({{asset("img/freeongkir.jpg")}}) no-repeat; padding-top:20px;'>
                
                <center>
                  <br>
              <h5><span style="color:red;"><strike>Rp.360.000,00-</strike></span></h5>
                <h3><span style="color:green;">Rp.300.000,00-</span></h3></center>

                </div>

                <div style='border-top:1px #c0c0c0; text-align:center'>     <button type="button" class="btn btn-primary"   style="margin:10px"> Get <br>Better Price ! </button>

                      
                      <button type="button" class="btn btn-danger " style="margin:10px"> Buy Now !</button>
                      <div class="clearfix">
                      
                <div>        
                      </div>
            </div>
        </div>
</div>
</div>
</div>
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