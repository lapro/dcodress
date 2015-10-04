@extends('adm/template')

@section('content')
<<<<<<< HEAD
<div class='box'>
<div class='box-header'>
<h3 class='box-title'>Product</h3>
</div>
<div class='box-body'>
=======
<div class="box">
    <div class="box-body">
<h1>Product</h1>
>>>>>>> origin/master
 <a class="btn btn-primary pull-right" id="sign"  href="{!! url('adm/products/create') !!}"><i class="icon-g-circle-plus"></i>Add Item</a>
 <br><br>
    <table class='table table-bordered' id='datatables'>
        <thead>
        <tr>
          <th>No.</th>
          <th>Set Name</th>
          <th>Description</th>
          <th>Original Price</th>
          <th>Capital Price</th>
          <th>Price</th>
          <th>Sharing Count</th>
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
                    { data: 'rownum', name: 'rownum' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'original_price', name: 'original_price' },
                    { data: 'capital_price', name: 'capital_price' },
                    { data: 'price', name: 'price' },
<<<<<<< HEAD
                    { data: 'sharing_count', name: 'sharing_count' },
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


=======
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
>>>>>>> origin/master
        });
    });
     
 </script>
 @stop

