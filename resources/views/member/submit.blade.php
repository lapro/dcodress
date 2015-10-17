
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
    <script type="text/javascript">
        $(".upload").change(function(){
            $("#form-share").submit();
        });
    </script>

<div class='row'>
<div class='col-md-3'>

</div>
<div class='col-md-6'>
<div class='share' style='border:1px solid #000'>

 <center>
<div >

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="">
    <li role="presentation" class="active"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab"><i class='fa fa-upload'></i> Upload</a></li>
    <li role="presentation" class='hidden-lg hidden-md'><a href="#take" aria-controls="take" role="tab" data-toggle="tab"><i class='fa fa-camera'></i> Take a Pic</a></li>
      <li role="presentation"><a href="#create" aria-controls="take" role="tab" data-toggle="tab"><i class='fa fa-magic'></i> Create</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="upload">
<h3 style='font-weight:bold;text-decoration:underline;'>Share <span style='color:red;'>#OOTD</span> kamu hari ini</h3>
<small>Jadikan outfit kalian inspirasi bagi orang lain</small>
            
 
                {!! Form::open(['url' => ('post/upload'), 'class' => 'dropzone', 'files'=>true, 'id'=>'form-share']) !!}
 
                <div class="dz-message">
 
                </div>

               <div class="fileUpload btn btn-primary">
                    <span>Upload Outfit</span>
                    <input name="file" type="file" class="upload" />
                </div>

                {!! Form::close() !!}

    </div>
    
<!-- ################## take #######################-->
    <div role="tabpanel" class="tab-pane" id="take">
        
        {!! Form::open(['url' => ('post/upload'), 'class' => 'dropzone', 'files'=>true, 'id'=>'form-share']) !!}
 
                <div class="dz-message">
 
                </div>

               <div class="fileUpload btn btn-primary">
                    <span>Take a pic</span>
                    
         <input type="file" accept="image/*" capture="camera" />
                </div>

                {!! Form::close() !!}
    </div>
    <div role="tabpanel" class="tab-pane" id="create">
        <br><br>
        cooming soon ..
    </div>
    
  </div>

</div>


</center>
<br>
</div>
</div>
<div class='col-md-3'>

</div>
</div>
<div class='clearfix'></div>
<br>