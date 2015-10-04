@extends('template')

@section('content')
 


<div class='col-md-6 col-lg-offset-3' style='border:1px solid #c0c0c0; padding:20px'>
<h3 style='border-bottom:1px dashed black ' class='checkout-form-title'>Konfirmasi Pembayaran</h3>
<br>

  {!! Form::open(['url'=>'checkout/confirmation/'.$kode,'class'=>'form-horizontal col-md-12']) !!}

     <div class="form-group">
      {!! Form::label('kode_transaksi','Kode Transaksi :') !!}
      {!! Form::text('kode',@$kode,['class'=>'form-control',"required",'id'=>"kode_transaksi"]) !!}
    </div>
    <div class="form-group">
      {!! Form::label('nama_bank','Nama Bank :') !!}
      {!! Form::text('from_bank_name',null,['class'=>'form-control',"required",'id'=>"kode_transaksi"]) !!}
    </div>
    <div class="form-group">
      {!! Form::label('account_name','Nama Akun :') !!}
      {!! Form::text('from_account_name',null,['class'=>'form-control',"required",'id'=>"account_name"]) !!}
    </div>
    <div class="form-group">
      {!! Form::label('rekening_number','Nomor Rekening :') !!}
      {!! Form::text('from_rekening_number',null,['class'=>'form-control',"required",'id'=>"rekening_number"]) !!}
    </div>
    <div class="form-group">
      <?php
        $obaList[null] = "- pilih tujuan transfer - "; 
        foreach ($oba as $key => $value) {
            $obaList[$value->id] = $value->bank_name." - ".$value->account_name." : ".$value->rekening_number;
        }
      ?>
      {!! Form::label('to','Tujuan Transfer :') !!}
      {!! Form::select('to',$obaList,null,['class'=>'form-control',"required",'id'=>"to"]) !!}
    </div>
    <div class="form-group">
      {!! Form::label('trans_amount','Jumlah Transfer :') !!}
      {!! Form::text('trans_amount',null,['class'=>'form-control',"required",'id'=>"trans_amount"]) !!}
    </div>
    <div class="form-group">
      {!! Form::label('trans_date','Tanggal Transfer :') !!}
      {!! Form::input("date",'trans_date',null,['class'=>'form-control',"required",'id'=>"trans_date"]) !!}
    </div>

    
  <br>
    <div class="form-group">

      {!! Form::submit('Konfirmasi',['class'=>'btn btn-primary pull-right']) !!}
    </div>



  {!! Form::close() !!}
</div>


@stop

@section('footer')

<script type="text/javascript">

   

</script>
@stop