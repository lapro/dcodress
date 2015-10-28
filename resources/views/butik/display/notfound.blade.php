@extends('template')

@section('content')

<center>

<h2>Tidak Di Temukan</h2>
Maaf outfit yang anda cari tidak di temukan
<br><br>
<a href='{!! url("butik/random")!!}' class='btn btn-primary shadow'><i class='fa fa-random'></i> Random Outfit ~</a>
</center>
@stop