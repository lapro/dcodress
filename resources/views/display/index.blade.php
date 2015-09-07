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
@stop