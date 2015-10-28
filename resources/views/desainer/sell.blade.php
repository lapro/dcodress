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
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview-img').attr('src', e.target.result);
            $('#preview').show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(".upload").change(function(){
    readURL(this);
});

/*
 function getCategory(){
    var token = "<?php echo csrf_token(); ?>";
        $.ajax({
          method: "GET",
          url: "{!! url("category?type=form") !!}"
        })
        .done(function( data ) {

              $("#category").html(data);
        });
    }
getCategory();
*/

$( document ).ready(function() {

    var tags = [
    @foreach ($tags as $tag)
    {tag: "{{$tag}}" },
    @endforeach
    ];

    var itemTags =[
    	@if(!empty($post))
    	@foreach($post->tags as $pt)
    		"{{$pt->name}}",
    	@endforeach
    	@endif
    ];
    

    $('#tags').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'tag',
        labelField: 'tag',
        searchField: 'tag',
        options: tags,
        items:itemTags,
        create: function(input) {
            return {
                tag: input
            }
        }
    });
});

</script>
@stop

@section('content')

<div class='col-md-7 col-md-offset-3'  style='border:1px solid #c0c0c0; padding:20px'>
<center>
<h3 style='font-weight:bold;text-decoration:underline;'>Jual Hasil <span style='color:red;'>Karya </span>Kamu</h3>
<small>Fokuslah berkarya, kami yang akan membantu menjual hasil karya kamu</small></center>
<br><br>
{!! Form::open(['url' => ('sell'), 'class' => 'dropzone', 'files'=>true, 'id'=>'form-share-upload']) !!}
 
                <div class="dz-message">
 
                </div>
<div class='col-xs-5'>
<center>		
				@if(empty($post))
                <div id='preview' style='display:none'  class='thumbnail ' >
                    <img src="" id='preview-img' class=''   style='height:100%;width:100%'/>
                </div>
                <div class="fileUpload btn btn-primary">
                    <span>Upload Outfit</span>
                    <input name="file" type="file" accept="image/*" class="upload autosubmit-upload" />
                </div>
                @else<div class='col-md-12'>
                <img src="{!! $post->image !!}" class='thumbnail' style="width:100%"/>
                <input name="image" type='hidden' value="{!! $post->image !!}" />
                <input name="thumb" type='hidden' value="{!! $post->thumb !!}" />
            	</div>
                @endif
</center>
</div>
<div class='col-xs-7'>

                 <div class="form-group">
                {!! Form::label('deskripsi','Nama Outfit :') !!}
                {!! Form::text('name',@$post->name,['class'=>'form-control',"required"]) !!}
                </div>
              <div class="form-group">
                {!! Form::label('deskripsi','Deskripsi :') !!}
                {!! Form::textarea('description',@$post->description,['class'=>'form-control',"required","style"=>"height:60px"]) !!}
                </div>
              <div class="form-group">
                    {!! Form::label('email','Tags :') !!}
                    <input type="text" name="tags" id="tags">
                </div>
                <div class="form-group">
                    {!! Form::label('email','Harga :') !!}
                    <input type="number" name="original_price" class='form-control'>
                </div>
                 <div class="form-group">
                    {!! Form::label('email','Berat (gr):') !!}
                    <input type="number" name="weight" class='form-control'>
                </div>

        <div class="form-group">
			<label> Cara Promosi :</label><br>
			{!! Form::checkbox("cara_promo[]",1) !!} Sharing Discount <a href="#">(detail) </a><br>
			
		</div>
                 

              {!! Form::submit('Ajukan',['class'=>'btn btn-danger pull-right']) !!}
</div>

    {!! Form::close() !!}
<div class='clearfix'></div>
</div>


@stop