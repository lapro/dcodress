@if($do=="local")
@foreach($post as $p)
        <div class="col-xs-6 col-md-3">
            <a href="{!! url('detail/'.$p->kode) !!}" class="thumbnail">
              <img src="{!! url('posts/'.$p->image) !!}" alt="...">
            </a>
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
    <div class="col-xs-6 col-md-3">
            <a href="{!! url('butik/'.$p->slug) !!}" class="thumbnail">
              <img src="{!! url($p->images[0]->url) !!}" alt="...">
            </a>
          </div>
        
@endforeach
@endif