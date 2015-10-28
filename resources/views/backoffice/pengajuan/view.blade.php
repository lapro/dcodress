@extends('backoffice.template')

@section('content')
<div class='box'>
<div class='box-header'>

</div>
<div class='box-body'>

 <br><br>
   <div class="col-md-4">
      <div class='col-md-12'>
          <img src="{!! url($product->image) !!}" class='thumbnail' style='width:100%'/>
      </div>
      <div class='col-md-12'>
      <table class="table">
        <tr>
          <td style='width:100px'>Nama Set</td>

          <td>:</td>

          <td>{!! $product->name!!}</td>
        </tr>
        <tr>
          <td>Harga</td>

          <td>:</td>

          <td>{!! toRupiah($product->original_price) !!}</td>
        </tr>
        <tr>
          <td>Berat</td>

          <td>:</td>

          <td>{!! $product->weight!!}</td>
        </tr>
        <tr>
          <td>Deskripsi</td>

          <td>:</td>

          <td>{!! $product->description!!}</td>
        </tr>
      </table>
   </div>
   </div>

   <div class='col-md-4'>
        {!! Form::open(['url'=>'backoffice/pengajuan/'.$product->id,'class'=>'form-horizontal col-md-12','method'=>'PUT']) !!}
        <div class="form-group">
          <small>Input harga jual yang akan di tampilkan di butik</small><br>
          {!! Form::label('email','Harga Jual :') !!}
          {!! Form::input('number','price','',['class'=>'form-control',"required"]) !!}
        </div>
          {!! Form::submit('Setujui',['class'=>'btn btn-primary pull-right']) !!}
          
          <a href="" class='btn btn-danger pull-right' style='margin-right:10px'> Tolak</a>
      {!! Form::close() !!}
    </div>

   
</div>
</div>
@stop

@section('footer')

 </script>
 @stop

