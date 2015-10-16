@extends('template')

@section('header')
 
@stop
 
@section('footer')
@stop

@section('content')
<div class='row'>
<div class='col-md-5 col-md-offset-1'>
<div class='col-md-12'>
<img src="{!! url('posts/'.$post->image)!!}" style='width:100%;'/>
</div>           
</div>
<div class='col-md-4' >
<div class='share col-md-12' style=''>
 
 
Warna:
<div style="overflow: hidden">
    @foreach($post->colors as $color)
<div style="width: 20px; float: left; height: 20px; background-color: <?php echo $color->name ?>"></div>
    @endforeach
</div>
<br>
<h4>Kategori :</h4>
{!! $post->categories[0]->name !!} <br><br>

<h4>Deskripsi :</h4>
{!! $post->description !!} <br>


</div>
</div>
<!--
<div class='col-md-3' style='border-left: 1px solid #c0c0c0;min-height: 200px'>

<div class='col-md-12'>
Pengumuman :
</div>


</div>
-->
</div>
@stop