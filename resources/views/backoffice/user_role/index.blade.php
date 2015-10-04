@extends('backoffice.template')

@section('title')
	Manajemen User <small>memberikan "role" kepada user</small>
@stop

@section('breadcrumb')
<li><a href="#">
	<i class="fa fa-dashboard"></i> Home</a>
</li>
<li class="active">Dashboard</li>
@stop

@section('content')
<div class='box'>
<div class='box-header'>
</div>
<div class='box-body'>
 
 <br><br>
    <table class='table table-bordered' id='datatables'>
        <thead>
        <tr>
        <th>No.</th>
       {!! "<th>".implode($column,"</th><th>")."</th>" !!}
       	<th>Aksi</th>
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
                ajax: '{!! url("backoffice/users/datatables") !!}',
                columns: [
                { data: 'no', name: 'no' },
                @foreach($column as $val)
                	{!! "{ data: '".strtolower($val)."', name: '".strtolower($val)."' },"!!}	 
                @endforeach
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false}
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