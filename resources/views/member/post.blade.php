@extends('template')

@section('header')
 
@stop
 
@section('footer')
@stop

@section('content')
<div class='row'>
<div class='col-md-5'>
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
{!! Form::open(['url' => ('post/'.$post->kode), 'id'=>'form-share']) !!}
<div class="form-group">
                    {!! Form::label('email','Deskripsi :') !!}
                    {!! Form::textarea('description','',['class'=>'form-control',"required","style"=>"height:100px"]) !!}
                </div>
<div class="form-group">
                    {!! Form::label('email','Kategori :') !!}
                    {!! Form::select('category',$cat,'',['class'=>'form-control',"required"]) !!}
                </div>
<div class="form-group">
                    {!! Form::label('email','Share Juga :') !!}<br>
                    <input type='checkbox' name='social[]' value="facebook" /> Facebook <br>
                    <input type='checkbox' name='social[]' value="instagram" /> Instagram <br>
                </div>

{!! Form::submit('Share',['class'=>'btn btn-primary pull-right']) !!}
{!! Form::close() !!}

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