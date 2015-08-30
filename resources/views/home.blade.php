<!DOCTYPE html>
<html>
<head>
	<title></title>

	{!!Html::style('assets/bootstrap/css/bootstrap.css')!!}
	{!!Html::script('assets/jquery/jquery-2.1.4.min.js')!!}
  {!!Html::style('assets/style.css')!!}
  
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
          <a class="navbar-brand" style="color:black;" href="#">DCODRESS</a>
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
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      {!! Html::image('assets/gallery/gallery-1.jpg','First Picture', array('class'=>'rcorners2','style'=>'width:100%; height:500px;','alt'=>'0')) !!}
    </div>

    <div class="item">
      {!! Html::image('assets/gallery/lemari-pakaian-jati-minimalis.jpg','Second Picture', array('style'=>'width:100%; height:500px;','alt'=>'1')) !!}
    </div>
</div>

      </div>

    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            
                <div class="panel-body" style="min-height:445px;">
                  Deskripsi:
                </div>
                      <button type="button" class="btn btn-danger pull-right" style="margin:10px"> Buy Now </button>
                      <button type="button" class="btn btn-primary pull-right" style="margin:10px"> Share </button>
                      <div class="clearfix">
                        
                      </div>
            </div>
        </div>

{!!Html::script('assets/bootstrap/js/bootstrap.min.js')!!}
</body>
</html>