@extends('template')

@section('content')    
    <div class="row" >
    	<div class="col-md-6">
  <!-- Wrapper for slides -->
  <div id="owl-display" class="owl-carousel" style='margin-top:20px'>
    @foreach($product->images as $img)
    <div class="item ">
      {!! Html::image(url($img->url),'First Picture',['style'=>'']) !!}
    </div>
    @endforeach
    
</div>

     

    </div>

    <div class="col-lg-6">
            
                <div class="panel-body" style="min-height:300px;">
                <span style='font-size:14pt;font-weight:bold;'>{{ $product->name }}</span><hr>
<div style="overflow: hidden;float:left">
    @foreach($product->colors as $color)
<div style="width: 20px; float: left; height: 20px; background-color: <?php echo $color->name ?>"></div>
    @endforeach
</div>
<div class='pull-right' style='font-weight:bold'>
<i class='fa fa-list'></i>
{!! $product->categories[0]->name !!}
</div>
<div class='clearfix'></div>
<br>
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

                <div style='border-top:1px #c0c0c0; text-align:center'>     <span title="The tooltip" data-toggle="tooltip" data-placement="top"><a href='{{url('share/'.$product->slug)}}' class="btn btn-default"  data-toggle="modal" data-target="#remote-modal-sm" style="margin:5px;" id='share_button'  > <i class='fa fa-hand-paper-o'></i><br> Get Your Price </a></span>

                      
                      <a href="#" class="btn btn-danger " style="margin:5px 5px 5px 0px" data-toggle="modal" data-target="#modal-cart" data-tipe='add' data-slug='{!! $product->slug !!}'>
                        <i class='fa fa-shopping-cart'></i><br>
                       Pick Your Dress</a>
                      <div class="clearfix">
                      
                <div>        
                      </div>
            </div>
        </div>

</div>

</div>
<br><br><br>
<center>
<small>Random pencarian,</small><br>
<a href='#' class='btn btn-primary shadow'><i class='fa fa-search'></i> Liat-liat yang lain ~</a>
</center>
@stop

@section('header')

@stop

@section('footer')
  <script type="text/javascript">

      

      $("#owl-display").owlCarousel({
  
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
      });
      /*
      var share = decodeURIComponent($.urlParam('share'));
      if(share == 'true'){
          
          $('#share_button').trigger('click');
          console.log('ass');
      }

          /* get variable from URL 
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
  
  $(document).ready(function(){
    $('#dont_show_again').click(function(){
        Cookies.set('welcome', 'false', { expires: 30 });
    });

  });*/
    
  </script>
@stop