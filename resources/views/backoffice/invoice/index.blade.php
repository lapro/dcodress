@extends('backoffice.template')

@section('content')
<div class='box'>
<div class='box-header'>
<h3 class='box-title'>Product</h3>
</div>
<div class='box-body'>
<div class="btn-group" data-toggle="buttons-radio">
    <button type="button" class="btn btn-primary btn-xs active" data-toggle="button" data-status = "all" aria-pressed="true">Semua</button>
    <button type="button" class="btn btn-primary btn-xs" data-toggle="button" aria-pressed="true" data-status = "1">Belum Konfirmasi</button>
    <button type="button" class="btn btn-primary btn-xs" data-toggle="button" data-status = "2">Menunggu Verifikasi </button>
    <button type="button" class="btn btn-primary btn-xs"  data-toggle="button" data-status = "3">Dalam Pengiriman</button>
    <button type="button" class="btn btn-primary btn-xs"  data-toggle="button" data-status = "4">Selesai</button>
</div>
<input type="hidden" id="buttonvalue" value='all'/>
 <br><br>
 <div style="overflow-x: scroll">
    <table class='table table-bordered ' id='datatables'>
        <thead>
        <tr>
          <th>No.</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Total</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
  </div>
</div>
</div>
@stop

@section('footer')

 {!!Html::script("assets/Laravel/laravel.methodHandler.js")!!}
  
 <script type="text/javascript">    

    $(document).ready(function(){

        

         var oTable =    $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                          url: '{!! url("backoffice/invoices/datatables") !!}',
                          data: function (d) {
                              d.status = $("#buttonvalue").val();
                          }
                      },
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'kode', name: 'kode' },
                    { data: 'name', name: 'name' },
                    { data: 'total', name: 'total' },
                    { data: 'status', name: 'status' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            }).on("draw.dt",function(){
              //inisialisi saat datatables setelah load
                var _token = "<?php echo csrf_token(); ?>";
                   $('a[data-method]').click(function(e){
                      handleMethod(e,$(this),_token);
                      e.preventDefault();
                   });
            });

          $(".btn-group button").click(function (e) {
            e.preventDefault();
            $("#buttonvalue").val($(this).data('status'));
            //alert($("#buttonvalue").val());
            $(".btn-group button").removeClass("active");
            $(this).addClass('active');

            oTable.draw();

        });
    });
     
 </script>
 @stop

