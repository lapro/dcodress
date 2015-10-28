@extends("template")

@section('content')
<div class='row'>
<div class='col-md-12'>
<div class='col-md-4'>
	  <ul class="nav nav-pills nav-stacked" role="tablist">
    <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Akun</a></li>
    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    
  </ul>
</div> <!-- end col-md 4 -->
<div class='col-md-4'>
	<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane " id="home">
    	@include("member.setting.account")
    </div>
    <div role="tabpanel" class="tab-pane active" id="profile">
    	@include("member.setting.profil")
    </div>
  </div>
	
</div> <!-- end col-md 4 -->
<div class='col-md-4'>

</div> <!-- end col-md 4 -->

</div>
</div>
@stop