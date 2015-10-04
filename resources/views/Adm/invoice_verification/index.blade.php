@extends('adm/template')

@section('content')
<div class='box'>
<div class='box-header'>
Invoice Verification</div>
<div class='box-body'>
Daftar Invoice yang harus di verifikasi oleh admin. pada tahap ini admin memeriksa secara manual apakah transfer yang dilakukan pembeli sudah diterima di bank tujuan. kemudian admin menginputkan data resi pengiriman.
<br><br>
<? $banyakKol = 3; $count=0; $first=true; ?>
@foreach ($invoice as $key => $value)
@if($count%3==0 and $first)
  <div class='col-md-12'>
<?php $first=false; ?>
@endif
  <div class='col-md-4' style='border: 1px solid #c0c0c0'>
    
      {!! $value->kode !!}
      {}
    
  </div>
@if($count%3==0 and !$first)
  </div>
<?php $first = true; ?>
@endif
<?php $count++; ?>
@endforeach
@if($count%3==0 and !$first)
  </div>
<?php $first = true; ?>
@endif



</div>
</div>
@stop

@section('footer')

   
 <script type="text/javascript">    

   
     
 </script>
 @stop

