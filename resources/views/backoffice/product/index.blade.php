@extends('backoffice.template')

@section('content')
<div class='box'>
<div class='box-header'>
<h3 class='box-title'>Product</h3>
</div>
<div class='box-body'>
 <a class="btn btn-primary pull-right" id="sign"  href="{!! url('backoffice/products/create') !!}"><i class="icon-g-circle-plus"></i>Add Item</a>
 <br><br>
    <table class='table table-bordered' id='datatables'>
        <thead>
        <tr>
          <th>No.</th>
          <th>Gambar</th>
          <th>Nama Set</th>
          <th>Harga Awal</th>
          <th>Harga Jual</th>
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

        $(function() {

            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("backoffice/products/datatables") !!}',
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'images', name: 'images' },
                    { data: 'name', name: 'name' },
                    { data: 'original_price', name: 'original_price' },
                    { data: 'price', name: 'price' },
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


        });
    });
     
 </script>
 @stop

