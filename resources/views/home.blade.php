<!DOCTYPE html>
<html>
<head>
	<title></title>

	{!!Html::style('assets/bootstrap/css/bootstrap.css')!!}
	{!!Html::script('assets/jquery/jquery-2.1.4.min.js')!!}
  {!!Html::style('assets/style.css')!!}
  
  <style type="text/css">

.navbar .brand {
max-height: 40px;
overflow: visible;
padding-top: 0;
padding-bottom: 0;
}
.navbar a.navbar-brand {padding: 9px 15px 8px; }
  </style>

</head>
<body>
<br>
	<div class="container">
  <nav class="navbar navbar-inverse shadow-arch-edges" style="background-color:oldlace; border:none">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:black;" href="#"><img src="{{asset('img/logo.png')}}"></a>
        </div>     
    </nav>

<br>
<!-- Carousel
    ================================================== -->
    <div class="row">
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
      {!! Html::image('product/sunday-outfit.jpg','First Picture', array('class'=>'rcorners2 ','style'=>'width:100%; height:500px;','alt'=>'0')) !!}
    </div>

    <div class="item">
      {!! Html::image('assets/gallery/lemari-pakaian-jati-minimalis.jpg','Second Picture', array('class'=>'rcorners2 ','style'=>'width:100%; height:500px;','alt'=>'1')) !!}
    </div>
</div>

      </div>

    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            
                <div class="panel-body" style="min-height:310px;">
                <h4>Deskripsi:</h4><br>

                <h5>Nama Set :<span style="color:orange;">Sunday Outfit</span></h5><br>
                <h5>Kelengkapan :</h5>
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
                  Harga : 
                <h4><span style="color:red;"><strike>Rp.360.000,00-</strike></span></h4>
                <h2><span style="color:green;">Rp.300.000,00-</span></h2></center>
                </div>
                <div style='border-top:1px #c0c0c0; text-align:center'>     <button type="button" class="btn btn-primary"   style="margin:10px"> Share </button>
                      
                      <button type="button" class="btn btn-danger " style="margin:10px"> Buy Now </button>
                      <div class="clearfix">
                      
                <div>        
                      </div>
            </div>
        </div>

{!!Html::script('assets/bootstrap/js/bootstrap.min.js')!!}
</body>
</html>