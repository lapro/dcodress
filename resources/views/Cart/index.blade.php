

 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style='background:oldlace;padding:2px;

height: 70px; 
width: 70px;
border-radius: 45px;
-moz-border-radius: 45px;
-webkit-border-radius: 45px;
 
  '>×</span></button>
 <div class='clearfix'></div>
<div class='modal-body' >
<h3>Keranjang Belanja</h3><br>
<div class='row' >
    
     <div class="col-md-12" >
      <div id='dc-basket'> loading ... </div>

          <a href="#" class='btn btn-link'><i class='fa fa-search'></i> Jelajahi lebih jauh</a>

          <a href="{!! url('checkout/user') !!}" class='btn btn-primary pull-right shadow'> Selesai Belanja, Selanjutnya <i class='fa fa-arrow-right'></i></a>
          <div class='clearfix'></div>
            </div>


</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

  function init(){
    
    $(".hapus-btn").click(function(){
        var rowId = $(this).data('rowid');
        hapus(rowId);
    });

  }

  function getBasket(){

      var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("cart/basket") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $('#dc-basket').html(data);
              init();
        });
    }

  function hapus(rowId){

      var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("cart/remove") !!}/"+rowId,
          data: { _token: token }
        })
        .done(function( data ) {

              getBasket();
        });
  }


    getBasket();
});
</script>