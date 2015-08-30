<!DOCTYPE html>
<html>
<head>
	<title></title>

	{!!Html::style('assets/bootstrap/css/bootstrap.css')!!}
	{!!Html::style('assets/jquery/jquery-2.1.4.min.js')!!}

  <style type="text/css">
    .rcorners2 {
    border-radius: 10px;
    width: 845px;
    height: 505px;
  }

  .shadow-arch-edges {
    position: relative;
    box-shadow: 0 12px 10px -12px hsla(0, 0%, 0%, 1);
  }

  .shadow-arch-edges:before, .shadow-arch-edges:after {
    position: absolute;
    content: "";
    width: 15%;
    bottom: 10px;
    box-shadow: 0 0 12px 10px hsla(0, 0%, 0%, .5);
    z-index: -10;
  }

  .shadow-arch-edges:before {
    left: 24px;
    transform: skewY(-12.5deg);
  }

  .shadow-arch-edges:after{
    right: 24px;
    transform: skewY(12.5deg);
  }

  </style>
</head>
<body>
<br>
	<div class="container">
  <nav class="navbar navbar-inverse shadow-arch-edges" style="background-color:pink; border:none">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>     
    </nav>

<br>
<!-- Carousel
    ================================================== -->
    <div class="row">
    	<div class="col-md-9">
   
        <div id="myCarousel" class="carousel slide rcorners2" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      {!! Html::image('assets/gallery/gallery-1.jpg','First Picture', array('class'=>'rcorners2','style'=>'width:100%; height:500px;')) !!}
    </div>

    <div class="item">
      {!! Html::image('assets/gallery/lemari-pakaian-jati-minimalis.jpg','First Picture', array('style'=>'width:100%; height:500px;')) !!}
    </div>
</div>

      </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning" style="min-height:500px;">
            <div class="panel-heading">Panel heading without title</div>
                <div class="panel-body" style="min-height:400px;">
                  Deskripsi:
                </div>
                <div class="clearfix"></div>
                      <button type="button" class="btn btn-danger pull-right" style="margin:10px"> Buy Now </button>
                      <button type="button" class="btn btn-primary pull-right" style="margin:10px"> Share </button>
                <div class="clearfix"></div>
            </div>
        </div>

</body>
</html>