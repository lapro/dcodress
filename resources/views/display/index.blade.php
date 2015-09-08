@extends('template')

@section('content')    
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
        <div class="panel panel-warning" style=''>
            
                <div class="panel-body" style="min-height:275px;">
               <br><center><span class='label label-primary shadow' style=" font-size:12pt;">- {{ $product->name }} -</span></center><br>
               
                <h5 style="">
                  {!! $product->description !!}
                </h5>
                
                </div>
                <div style='background:url({{asset("img/freeongkir.jpg")}}) no-repeat; padding-top:20px;'>
                
                <center>
                  <br>
              <h4><span style="color:black;"><strike>Rp.{{ $product->original_price }}</strike></span></h4>
                <h2><span style="color:red;">Rp.300.000,00-</span></h2></center>

                </div>

                <div style='border-top:1px #c0c0c0; text-align:center'>     <button type="button" class="btn btn-primary shadow"   style="margin:10px;"> Get <br>Better Price ! </button>

                      
                      <button type="button" class="btn btn-danger shadow" style="margin:10px"> Buy Now !</button>
                      <div class="clearfix">
                      
                <div>        
                      </div>
            </div>
        </div>
</div>
</div>
</div>
@stop