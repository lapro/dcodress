@extends('backoffice.template')

@section('content')
<div class='box'>
<div class='box-header'>
<h3 class='box-title'>Daftar Product Yang Diajukan</h3>
</div>
<div class='box-body'>

 <br><br>
    <table class='table table-bordered' id='datatables'>
        <thead>
        <tr>
          <th>No.</th>
          <th>Gambar</th>
          <th>Nama Set</th>
          <th>Tanggal</th>
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
                ajax: '{!! url("backoffice/pengajuan/datatables") !!}',
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'image', name: 'image' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
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

