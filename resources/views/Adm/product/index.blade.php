@extends('adm/template')

@section('content')
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
        </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
@stop

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
                    { data: 'status', name: 'status' }
                ]
            });
        });
    });
     
 </script>
 @stop

