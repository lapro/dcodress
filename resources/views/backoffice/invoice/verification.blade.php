@extends('backoffice.template')

@section('content')
<div class='col-md-6'>
<div class='box'>
<div class='box-header'>
<h3 class='box-title'>Detail Invoice</h3>
</div>
<div class='box-body' id='detail'>

</div>
</div>
</div>
<div class='col-md-6'>
<div class='box'>
<div class='box-header'>
<h3 class='box-title'>Form Verification</h3>
</div>
<div class='box-body'>

{!! Form::open(['url'=>'backoffice/invoices/verification/'.$id,'class'=>'form-horizontal col-md-12']) !!}

    <div class="form-group">
      {!! Form::label('note','Note') !!}
      {!! Form::textarea('note',null,['class'=>'form-control',"required",'id'=>"note", "placeholder"=>"catat no.resi, kurir yang digunakan, atau tanggal COD disini.."]) !!}
    </div>
  <br>
    <div class="form-group">

      {!! Form::submit('Verification',['class'=>'btn btn-primary pull-right']) !!}
    </div>



  {!! Form::close() !!}

</div>
</div>
</div>
<div class='clearfix'></div>
@stop

@section("footer")
<script type="text/javascript">
    function getDetail(){
    var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("backoffice/invoices/detail/".$id) !!}",
          data: { _token: token }
        })
        .done(function( data ) {

              $("#detail").html(data);
        });
    }
  getDetail();

</script>
@stop