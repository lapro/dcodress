@if(count($post)>0)

    @if($do=="local")
    @foreach($post as $p)

            <div class="col-xs-6 col-md-2" id='grid'>
                <a href="{!! url('detail/'.$p->id.'-'.$str->slug($p->name)) !!}" class="thumbnail">
                  <img src="{!! $p->thumb !!}" alt="...">
                </a>
                <div class='pull-right' style='font-size: 8pt'>
                  
                  <span style='margin-right:5px'><i class='fa fa-eye'></i> {!! $p->views !!} </span>
                 <span style='margin-right:5px'> <i class='fa fa-share'></i> {!! $p->shares !!} </span>
                  <span style='margin-right:5px'><i class='fa fa-heart'></i> {!! $p->loves !!}</span>
                </div>
                <div class='clearfix'></div>
                <br><br>
              </div>
              
    @endforeach
    @elseif($do=="instagram")
    @foreach($post as $p)
    		<div class="col-xs-6 col-md-3">
                <a href="{!! $p->link !!}" class="thumbnail">
                  <img src="{!! $p->images->standard_resolution->url !!}" alt="...">
                </a>
              </div>
            
    @endforeach
    @elseif($do=="butik")

    @foreach($post as $p)
        <div class="col-xs-6 col-md-2" id="grid">
                <a href="{!! url('butik/'.$p->id.'-'.$str->slug($p->name)) !!}" class="thumbnail">
                  <img src="{!! url($p->thumb) !!}" alt="...">
                  
                </a>
                
                  <div>
                    <h4>{!! $p->name !!}<br> <small>by : Angga Kesuma</small></h4>
                    
                    @if($p->initial_price != $p->price)

                      <strike> {!! toRupiah($p->original_price) !!} </strike><br>
                      <span style='color:red;font-weight:bold'>{!! toRupiah($p->price) !!}</span>

                    @else

                      <span style='color:red;font-weight:bold'>{!! toRupiah($p->price) !!}</span>
                      
                    @endif
                  </div>
              </div>
            
    @endforeach
    @endif

@else

<center><br>Outfit masih kosong<br></center>

@endif

