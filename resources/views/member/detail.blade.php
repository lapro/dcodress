@extends('template')

@section('header')
 
@stop
 
@section('footer')
@stop

@section('content')
<div class='col-md-12'>
<div class='col-md-5 col-md-offset-1'>
<div class='col-md-12'>
<img src="{!! url($post->image)!!}"  style='width:100%'/>
<br><br>

</div>           
</div>
<div class='col-md-5' >

<div class='share col-md-12' style=''>

<h1>{!! $post->name !!}</h1>
<div style='font-size:10pt'>
by : <strong>{!! $post->author->name !!}</strong> | <strong>{!! $post->created_at->toFormattedDateString() !!}</strong>
</div>
<br>
@if(count($post->tags)>0)
@foreach ($post->tags as $tag)
	<span class='label label-primary' style='margin-right:5px'>
		{!! $tag->name !!} </span>
@endforeach
@endif
<hr>
<div class='' style='float:left' >
              <span style='margin-right:5px'><i class='fa fa-eye'></i> {!! $post->views !!} </span>
             <span style='margin-right:5px'> <i class='fa fa-share'></i> {!! $post->shares !!} </span>
              <span style='margin-right:5px'><i class='fa fa-heart'></i> {!! $post->loves !!}</span>
            </div>

<div class=='clearfix'></div>
<?php /*
Warna:
<div style="overflow: hidden">
    @foreach($post->colors as $color)
<div style="width: 20px; float: left; height: 20px; background-color: <?php echo $color->name ?>"></div>
    @endforeach
</div>
*/
?>
<br><br><br>
<p>{!! nl2br($post->description) !!} </p>

<br>
<div class='clearfix'></div>

<a href="{!! url ('loving/'.$post->id)!!}" class='btn btn-danger pull-right
@if(!$post->lovable() and Auth::check())
disabled
@endif
'> <i class='fa fa-heart'></i> 
</a>

@if(Auth::check() AND Auth::user()->id == $post->author->id AND Auth::user()->hasRole('Desainer'))
	<a href="{!! url ('sell?pid='.$post->id)!!}" class='btn btn-primary pull-right' style='margin-right:10px'><i class='fa fa-money'></i> Jual</a>
@endif

<div class='clearfix'></div>
<hr>
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
<div class='clearfix'></div>
@stop