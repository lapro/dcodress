@extends("template")

@section('content')
<div class='row'>
<div class='col-md-12'>
<div class='col-md-4'>
	  <ul class="nav nav-pills nav-stacked" role="tablist">
    <li role="presentation" class="active"><a href="#penjual" aria-controls="home" role="tab" data-toggle="tab">Penjual</a></li>
    <li role="presentation" ><a href="#pembeli" aria-controls="profile" role="tab" data-toggle="tab">Pembeli</a></li>
    
  </ul>
</div> <!-- end col-md 4 -->
<div class='col-md-4'>
	<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="penjual">
<h3>Rules Sebagai Penjual</h3>
<hr>
    	<ol>
    		<li></li>
            <li>asas</li>
    	</ol>	
    </div>
    <div role="tabpanel" class="tab-pane " id="pembeli">
 <h3>Rules Sebagai Pembeli</h3>
<hr>
    	<ol>
    		<li>asas</li>
    	</ol>	
    </div>
  </div>
	
</div> <!-- end col-md 4 -->
<div class='col-md-4'>

</div> <!-- end col-md 4 -->

</div>
</div>
@stop