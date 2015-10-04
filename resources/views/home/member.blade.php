@extends('template')

@section('header')
 <style type="text/css">
    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
 </style>
@stop
 
@section('footer')
    <script type="text/javascript">
        $(".upload").change(function(){
            $("#form-share").submit();
        });
    </script>
@stop

@section('content')
<div class='alert alert-danger'>
Kamu belum ada username, Set Username kamu disini
</div>
<div class='row'>
<div class='col-md-3'>

</div>
<div class='col-md-6'>
<div class='share' style='border:1px solid #000'>
    <br>
 <center>
<h3 style='font-weight:bold;text-decoration:underline;'>Share <span style='color:red;'>#OOTD</span> kamu hari ini</h3>
<small>Jadikan outfit kalian inspirasi bagi orang lain</small>
            
 
                {!! Form::open(['url' => ('post/upload'), 'class' => 'dropzone', 'files'=>true, 'id'=>'form-share']) !!}
 
                <div class="dz-message">
 
                </div>

               <div class="fileUpload btn btn-primary">
                    <span>Pilih Outfit</span>
                    <input name="file" type="file" class="upload" />
                </div>

                {!! Form::close() !!}
</center>
<br>
</div>
</div>
<div class='col-md-3'>
<h4>Coming soon !!</h4>
Android App dan IOS App, keep support us guys ^.^<br><br>

</div>
<div class='clearfix'></div>
<hr>
<div class='col-md-12'>
    <h3 style='color:#c0c0c0 ;font-family: "AvantGarde", Arial, Sans-serif;'>Outfit <span style='color:#000'>Kamu :</span> </h3>
    <div class='clearfix'></div>
    <div class='row'>
        @foreach($post as $p)
        <div class="col-xs-6 col-md-3">
            <a href="{!! url('detail/'.$p->kode) !!}" class="thumbnail">
              <img src="{!! url('posts/'.$p->image) !!}" alt="...">
            </a>
          </div>
        @endforeach
    </div>
    <br>
    <div class='clearfix'></div>
    <center><a href='#' class='btn btn-primary '><i class='fa fa-search'></i> RIWAYAT</a></center>
</div>
<div class='clearfix'></div>
<hr>
<div class='col-md-12'>
    <h3 style='color:red;font-weight:bold'>Bahan <span style='color:#000'>Inspirasi :</span></h3>

    <br>
    <div class='clearfix'></div>
    <center><a href='#' class='btn btn-primary '><i class='fa fa-search'></i> JELAJAHI </a></center>
</div>
<div class='clearfix'></div>
<hr>
<div class='col-md-12'>
    <h3 style='color:red;font-weight:bold'>Instagram <span style='color:#000'>#OOTDcodress :</span></h3>

    <br>
    <div class='clearfix'></div>
    <center><a href='#' class='btn btn-primary '><i class='fa fa-search'></i> LIHAT </a></center>
</div>
</div>
@stop