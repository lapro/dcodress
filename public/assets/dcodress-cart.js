

  function init(){
    
    $(".hapus-btn").click(function(){
        var rowId = $(this).data('rowid');
        hapus(rowId);
    });

}

function hapus(_token, url, rowId){

        $.ajax({
          method: "GET",
          url: url+rowId,
          data: { _token: _token }
        })
        .done(function( data ) {

              getBasket();
        });

}

function getBasket(_token, url){

        $.ajax({
          method: "GET",
          url: url,
          data: { _token: _token }
        })
        .done(function( data ) {

              $('#dc-basket').html(data);
              init();
        });
}

