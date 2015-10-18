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
              <span style="color:red;font-size:18pt" id='harga'>{{ toRupiah($product->price) }}</span>
              </div>
                </div>

                <div style='border-top:1px #c0c0c0; text-align:center'>     <span title="The tooltip" data-toggle="tooltip" data-placement="top"><a href='{{url('butik/share/'.$product->slug)}}' class="btn btn-default"  data-toggle="modal" data-target="#remote-modal-sm" style="margin:5px;" id='share_button'  > <i class='fa fa-hand-paper-o'></i><br> Get Your Price </a></span>

                      
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
<a href='{!! url("butik/random?p=".$product->slug)!!}' class='btn btn-primary shadow'><i class='fa fa-random'></i> Random Outfit ~</a>
</center>

<div id='myModal' class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">

        Belanja, Sharing, Cari Inspirasi outfit anda disini :D


      </div>
      <div class="modal-footer">
        <input type="checkbox" id='dont_show_again'> ok, jangan tampilkan lagi ! 
        <button type="button" class="btn btn-default" data-dismiss="modal" style='margin-left:10px'><i class='fa fa-close'></i> Close</button>
        
      </div>

    </div>
  </div>
</div>
@stop

@section('header')

@stop

@section('footer')
  <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
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

          
  $.urlParam = function(name){
    var results = new RegExp('[\#&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
  }
    
      var share = decodeURIComponent($.urlParam('share'));
      if(share == 'true'){
          
          $('#share_button').trigger('click');
          console.log('ass');
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

  });


// firebase --------------- realtime harga
var ref = new Firebase("https://glaring-fire-934.firebaseio.com/products/{!! $product->slug !!}");
// Get the data on a post that has changed
ref.on("value", function(snapshot) {
  var changedPost = snapshot.val();
  var harga = toRp(changedPost.price);
  console.log(changedPost.price);
  $("#harga").html(harga);

});

function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
}
    
  </script>
@stop