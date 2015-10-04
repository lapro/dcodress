@extends('adm/template')

@section('content')
<div class='box'>
<div class='box-header'>
<h3 class='box-title'>Invoice</h3>
</div>
<div class='box-body'>
<div class="btn-group" data-toggle="buttons-radio">
    <button type="button" class="btn btn-primary active" data-toggle="button" data-status = "all" aria-pressed="true">Semua</button>
    <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="true" data-status = "1">Belum Konfirmasi</button>
    <button type="button" class="btn btn-primary" data-toggle="button" data-status = "2">Menunggu Verifikasi <span class='badge' style='font-size:7pt'>{!! $verifikasi !!}</span> </button>
    <button type="button" class="btn btn-primary"  data-toggle="button" data-status = "3">Selesai</button>
</div>
<input type="hidden" id="buttonvalue" value='all'/>
 <br><br>
    <table class='table table-bordered' id='datatables'>
        <thead>
        <tr>
          <th>No.</th>
          <th>Kode</th>
          <th>Total</th>
          <th>Payment Method</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
</div>
</div>
@stop

@section('footer')

 {!!Html::script("assets/Laravel/laravel.methodHandler.js")!!}
  
 <script type="text/javascript">    

    $(document).ready(function(){

       
            
            var oTable = $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                          url: '{!! url("adm/invoices/datatables") !!}',
                          data: function (d) {
                              d.status = $("#buttonvalue").val();
                          }
                      },
                columns: [
                    { data: 'rownum', name: 'rownum' },
                    { data: 'kode', name: 'kode' },
                    { data: 'total', name: 'total' },
                    { data: 'payment_method', name: 'payment_method' },
                    { data: 'status', name: 'status' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            })
            //.on("draw.dt",function(){
              //inisialisi saat datatables setelah load
              //  var _token = "<?php echo csrf_token(); ?>";
                //   $('a[data-method]').click(function(e){
                  //    handleMethod(e,$(this),_token);
                    //  e.preventDefault();
                   //});
            //});

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

