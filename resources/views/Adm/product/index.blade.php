@extends('adm/template')

@section('content')
<div class="box">
    <div class="box-body">
<h1>Product</h1>
 <a class="btn btn-primary pull-right" id="sign"  href="{!! url('adm/products/create') !!}"><i class="icon-g-circle-plus"></i>Add Item</a>
    <table class='table table-bordered' id='datatables'>
        <thead>
        <tr>
          <th>Id</th>
          <th>Set Name</th>
          <th>Description</th>
          <th>Original Price</th>
          <th>Price</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
@stop
</div>
</div>
@section('footer')

 {!!Html::script("assets/Laravel/laravel.methodHandler.js")!!}
  
 <script type="text/javascript">    

    $(document).ready(function(){

        $(function() {
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("adm/products/datatables") !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'original_price', name: 'original_price' },
                    { data: 'price', name: 'price' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            }).on('draw.dt',function(){
                   $('a[data-method]').click(function(e){
                      var token='<?php echo csrf_token(); ?>';
                      handleMethod(e,$(this),token);
                      e.preventDefault();
                   });
                });
        });
    });
     
 </script>
 @stop

