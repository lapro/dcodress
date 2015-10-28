<div class="modal fade " id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
              <div class="modal-dialog modal-lg" >
                <div class="modal-content" style='border-top:3px solid red'>

<div class="loading basketloading" style='display:none'>Loading&#8230;</div>

 <div class='clearfix'></div>
<div class='modal-body' >
  <button type="button" class="btn btn-link btn-lg pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h3>Keranjang Belanja</h3><br>
<div class='row' >
    
     <div class="col-md-12" >
      <div id='dc-basket'> </div>

<div class='checkout-btn' style='display:none'>
          <a href="{!! url('butik/checkout/pengiriman') !!}" class='btn btn-primary pull-right shadow'> CHECKOUT <i class='fa fa-arrow-right'></i></a>
</div>
          <a href="#" class='btn btn-link pull-right'><i class='fa fa-shopping-cart'></i> BELANJA LAGI</a>
          <div class='clearfix'></div>
            </div>


</div>
</div>

                  
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>



<script type="text/javascript">

$(document).ready(function(){
  $('#modal-cart').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var slug = button.data('slug') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback)
  var tipe = button.data('tipe')
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  //var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  //modal.find('.modal-body input').val(recipient)
  if(tipe == "add"){
    tambah(slug);
  }else{
    getBasket();
  }

})
  function init(){
    
    $(".hapus-btn").click(function(){
        var rowId = $(this).data('id');
        hapus(rowId);
    });

    $(".qtyInput").change(function(){
          getUpdate(this);
      });

  }

  function getUpdate(a){
    var rowId = $(a).data('id');
    var val = $(a).val();
    var token = "<?php echo csrf_token(); ?>";

    $.ajax({
          method: "GET",
          url: "{!! url("butik/cart/update") !!}/"+rowId+"/"+val,
          data: { _token: token }
        })
        .done(function( data ) {

              getBasket();
        });
  }

  function getBasket(){
      $(".basketloading").show();
      var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("butik/cart/basket") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $('#dc-basket').html(data);
              getCount();
              init();
              $(".basketloading").hide();
        });
    }

  function getCount(){
    var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("butik/cart/count") !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $("#jumlah-cart").html(data);
        });
  }

  function hapus(rowId){

      var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("butik/cart/remove") !!}/"+rowId,
          data: { _token: token }
        })
        .done(function( data ) {

              getBasket();
        });
  }

  function tambah(slug){
      var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("butik/cart/add") !!}/"+slug,
          data: { _token: token }
        })
        .done(function( data ) {

              getBasket();
        });
  } 


    getBasket();
});
</script>