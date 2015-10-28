@extends('template')

@section('content')    
    <div class="col-md-12" >
    	<div class="col-md-6">
  <!-- Wrapper for slides -->
  <div id="owl-display" class="owl-carousel" style='margin-top:20px'>
    
    <div class="item ">
      {!! Html::image(url($product->image),'First Picture',['style'=>'']) !!}
    </div>

    
</div>

     

    </div>

    <div class="col-lg-6">
            
                <div class="panel-body" style="min-height:300px;">
<h1>{!! $product->name !!}</h1>
<div style='font-size:10pt'>
by : <strong>{!! $product->author->name !!}</strong> | <strong>{!! $product->created_at->toFormattedDateString() !!}</strong>
</div>
<br>
@if(count($post->tags)>0)
@foreach ($product->tags as $tag)
  <span class='label label-primary' style='margin-right:5px'>{!! $tag->name !!} </span>
@endforeach
@endif
<hr>
<div style="overflow: hidden;float:left">
  <?php /*
    @foreach($product->colors as $color)
<div style="width: 20px; float: left; height: 20px; background-color: <?php echo $color->name ?>"></div>
    @endforeach
  */
    ?>
</div>
<div class='clearfix'></div>
<br>
                <h5 style="">
                  {!! nl2br($product->description) !!}
                </h5>
                

                </div> <!-- end panel -->
                <div <?php /*style='background:url({{asset("img/freeongkir.jpg")}}) no-repeat; padding-top:20px; */ ?>>
                

                  <br>
              <div style='text-align:center'>
               @if($product->initial_price != $product->price)
              <span style="color:black;font-size:12pt"><strike>{{ toRupiah($product->initial_price) }}</strike></span> <br>
              <span style="color:red;font-size:18pt" id='harga'>{{ toRupiah($product->price) }}</span>
              @else
                 <span style="color:red;font-size:18pt" id='harga'>{{ toRupiah($product->price) }}</span>
              @endif
              </div>
                </div>
<br><br>
                <div style='border-top:1px #c0c0c0; text-align:center'>     <span title="The tooltip" data-toggle="tooltip" data-placement="top"><a href='{{url('butik/share/'.$slug)}}' class="btn btn-default"  data-toggle="modal" data-target="#remote-modal-sm" style="margin:5px;" id='share_button'  > <i class='fa fa-hand-paper-o'></i><br> Get Your Price </a></span>

                      
                      <a href="#" class="btn btn-primary " style="margin:5px 5px 5px 0px" data-toggle="modal" data-target="#modal-cart" data-tipe='add' data-slug='{!! $slug !!}'>
                        <i class='fa fa-shopping-cart'></i><br>
                       Pick Your Dress</a>
                      <div class="clearfix">
                      <br><br>
                <div> 

                <small> 
                  @if($product->hasCaraPromo('sharing discount'))
                <span>* Share outfit ini, dan harga akan semakin murah </span>   
                  @endif
                </small>  

                      </div>
            </div>
        </div>

</div>

</div>
<div class='clearfix'></div>
<br><br><br>
<center>
<a href='{!! url("butik/random?p=".$product->id)!!}' class='btn btn-primary shadow'><i class='fa fa-random'></i> Random Outfit ~</a>
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
var ref = new Firebase("https://glaring-fire-934.firebaseio.com/products/{!! $slug !!}");
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