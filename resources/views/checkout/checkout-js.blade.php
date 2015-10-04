<script type="text/javascript">


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

              $('#dc-basket-checkout').html(data);
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

</script>