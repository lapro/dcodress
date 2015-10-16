@extends('template')

@section('content')
<div style='border:1px dashed #c0c0c0; padding:10px'>
<center>
<ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-done">PENGIRIMAN</li>
    <li class="progtrckr-current">KONFIRMASI</li>
    <li class="progtrckr-todo">PEMBAYARAN</li>
</ol>
</center>
</div>
<br>
<br>


<div class='col-md-10 col-md-offset-1' style='border:1px solid black'>
<center><h3>KONFIRMASI PESANAN</h3></center><hr>
<div class='alert alert-warning'>
	<center>
Harap periksa kembali data pesanan kamu. <br> pastikan informasi pelanggan, item yang di pesan, ongkos kirim, dan total sudah benar.
	</center>
</div>
<hr>
<div class='col-sm-6'>
Nama : {{ Session::get('invoice.name')}}<br>
Email : {{ Session::get('invoice.email')}}<br>
Handphone : {{ Session::get('invoice.handphone')}}<br>
</div>
<div class='col-sm-6'>
Provinsi : {{ Session::get('invoice.province')}}<br>
Kota : {{ Session::get('invoice.city')}}<br>
Alamat : {{ Session::get('invoice.address')}}<br>
</div>
<div class='clearfix'></div>
<hr>
<div id='basket-checkout'>
	@if(Cart::count()>0)


        <table class='table'>
<thead>
  <th>No.</th>
  <th>Outfit</th>
  <th>Harga</th>
  <th>Qty</th>
  <th>subtotal</th>
</thead>
<tbody>
  <?php $no = 1; ?>
  @foreach (Cart::content() as $key => $value) 
    <tr>
    <td>{!! $no++ !!}</td>
    <td width='50%'>
      
      <div class='col-md-3'>
      <img src="{!! url($value->options->detail->images[0]->url) !!}" style='width:100%'  />
      </div>
      <div class='col-md-8'>
      <h3><a href='{!! url("butik/".$value->options->detail->slug) !!}'>{!! $value->name !!}</a></h3>
      Berat : {!! $value->options->detail->weight !!} gram
    </div>
    <div class='col-md-1'>
    </div>
    </td>
    
    <td>{!! toRupiah($value->price) !!}</td>
    <td>{!! $value->qty !!}</td>
    <td>{!! toRupiah($value->subtotal) !!}</td>
  </tr>
  @endforeach
</tbody>

        </table>
  
@else
  <br>
  <div class='well'>
  <center>Keranjang masih kosong .. </center>
</div>
  <br>
@endif
        
               
      <br>
      <table class='table table-bordered'>
        <tr style='background:#fcfcfc'><td>Total</td><td>{!! toRupiah(Cart::total()) !!}</td></tr>
        <tr style='background:#fcfcfc'><td>Ongkos Kirim</td><td>
          <?php 
             echo Session::get('ongkir');
             $ongkir =0;
          ?>
        </td></tr>
        <tr style='background:#f5f5f5;font-size:18pt'><td><strong>GRAND TOTAL<strong></td><td style='color:red'><strong>{!! toRupiah(Cart::total() + $ongkir) !!}<strong></td></tr>
      </table> 

</div>

<br>
<a href="{!! url('butik/checkout/simpan')!!}" class='btn btn-primary shadow pull-right'> Selanjutnya </a>
<a href="" class='btn btn-link pull-right'> Perbaiki data pelanggan </a>
<div class='clearfix'></div>
<br>
</div>


@stop

@section('footer')

@stop