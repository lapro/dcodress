@extends('template')

@section('content')    
    <div class="row" >
    	<div class="col-md-8">
   
        <div id="myCarousel" class="col-md-12 carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      {!! Html::image('product/sunday-outfit.jpg','First Picture', array('class'=>'rcorners2 ','style'=>'width:100%; ','alt'=>'0')) !!}
    </div>

    <div class="item">

      {!! Html::image('assets/gallery/lemari-pakaian-jati-minimalis.jpg','Second Picture', array('class'=>'rcorners2 ','style'=>'width:100%; ','alt'=>'1')) !!}

    </div>
</div>

      </div>

    </div>

    <div class="col-lg-4">
            
                <div class="panel-body" style="min-height:300px;">
                <span style='font-size:14pt;font-weight:bold;'>{{ $product->name }}</span><hr>
               
                <h5 style="">
                  {!! $product->description !!}
                </h5>
                
                </div>
                <div <?php /*style='background:url({{asset("img/freeongkir.jpg")}}) no-repeat; padding-top:20px; */ ?>>
                
                
                  <br>
              <div style='text-align:center'>
              <span style="color:black;font-size:12pt"><strike>{{ toRupiah($product->original_price) }}</strike></span> <br>
              <span style="color:red;font-size:18pt">{{ toRupiah($product->price) }}</span>
              </div>
                </div>

                <div style='border-top:1px #c0c0c0; text-align:center'>     <a href='{{url('share/'.$product->slug)}}' class="btn btn-primary shadow"  data-toggle="modal" data-target="#remote-modal-sm" style="margin:5px;" id='share_button'> <i class='fa fa-hand-paper-o'></i><br> Pick Your Price </a>

                      
                      <a href="{{ url("cart/add/".$product->slug)}}" class="btn btn-danger shadow" style="margin:5px 5px 5px 0px" data-toggle="modal" data-target="#remote-modal-sm">
                        <i class='fa fa-shopping-cart'></i><br>
                       Get Your Dress</a>
                      <div class="clearfix">
                      
                <div>        
                      </div>
            </div>
        </div>

</div>
</div>
@stop

@section('footer')
  <script type="text/javascript">
      var share = decodeURIComponent($.urlParam('share'));
      if(share == 'true'){
          
          $('#share_button').trigger('click');
          console.log('ass');
      }
  </script>
@stop