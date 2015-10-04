
 <button style='margin:5px 10px 0px 0px' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
 <div class='clearfix'></div>
<div class='modal-body'>
<div class='row' >

     <div class="col-md-6 col-md-offset-3" style=' text-align:center'>
                
                
          <span style='font-size: 14pt;font-weight:bold'>Pilih Role User : <br></span>
          <br>
          {!! Form::open(['url'=>'backoffice/users/role/'.$user->id,'class'=>'form-horizontal col-md-12']) !!}
        @foreach ($role as $key => $value) 
          <div class="form-group">
          {!! Form::checkbox('roles[]',$value->id,in_array($value->id,toArrayEloquent($user->roles,"id"))) !!}
          {!! $value->name !!}
         </div>
          @endforeach

          {!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
      {!! Form::close() !!}
                
            </div>

</div>
                  </div>
                 

                 

