@extends('template')

@section('content')
<div class='col-md-6 col-md-offset-2'>
<br><br>
<h2>Terima Kasih</h2>
Outfit anda akan kami review terlebih dahulu sebelum kita tampilkan di butik, harap tunggu sebentar..
<br><hr>
<a href="{!! url('katalog')!!}" class='btn btn-link pull-right'> Katalog </a>

<a href="{!! url('sell')!!}" class='btn btn-link pull-right'> Jual Lagi </a>  
</div>
@stop