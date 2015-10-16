@extends('template')

@section('content')
 


<div class='col-md-5 col-lg-offset-1' style='border:1px solid #c0c0c0; padding:20px'>
	
	<div class='col-md-12 ' >
		<h3>Pilih Metode Pembayaran</h3>
<div class='alert alert-warning'>
		Transaksi anda sudah kami simpan, Detail transaksi sudah kami kirim ke email anda. Segera melakukan pembayaran paling lama <b>1x24 jam</b> agar kami bisa segera memproses transaksi anda.</div>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Cost On delivery (COD)
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        	@if($invoice->id_city == $configuration::getVal("origin_shipment"))
        		Anda dapat melakukan pembayaran dengan COD
        	@else 
        		Maaf Wilayah anda belum bisa melakukan pembayaran dengan COD

        	@endif
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Transfer Bank
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      	<ul>
          @foreach($oba as $o)
            <li><b>{!! $o->bank_name !!} </b><br>
          A.n : {!! $o->account_name !!} <br>
          No.rek : {!! $o->rekening_number !!}<br>
        </li>  
          @endforeach
    </ul>
        <hr>

        <center>
        	Setelah melakukan pembayaran pada salah satu rekening diatas, kamu bisa langsung klik tombol dibawah ini untuk melakukan konfirmasi pembayaran.<br>
        	<br> 
        	<a href="{!! url('butik/payment/konfirmasi?kode='.$invoice->kode.'&email='.$invoice->email)!!}" class='btn btn-primary shadow '>Konfirmasi Pembayaran</a></center>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Credit Card (CC)
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Coming Soon..
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class='col-md-4 col-lg-offset-1' style='border:1px solid #c0c0c0; padding:20px;'>
	<div class='row'>
	<div class='col-xs-6'>
		<strong>{!! $invoice->name !!}</strong><br>
		<small>{!! $invoice->email !!}<br>
		{!! $invoice->handphone !!}<br>

		</small>
	</div>
	<div class='col-xs-6' style="text-align:right">
	No. Resi:<br>
	<span style="font-weight:bold;font-size:14pt;">{!! $invoice->kode !!}</span><br>
	<a tabindex="0" role="button" class="btn btn-link" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{!! $invoice->getAddress() !!}">
  Lihat alamat
</a>

	</div>
	</div>
	<br>
	<table class='table table-bordered'>
		@foreach ($invoice->items as $key => $value) 
		<tr>
			<td colspan=2>
				<div class='label label-primary pull-right'>1 set</div>
				<span style='font-weight:bold;color:red'> {!! $value->name !!} </span>
				<br>
				 {!! toRupiah($value->price) !!} 
			</td>
			
		</tr>
		@endforeach	
		<tr style='background:#f4f4f4'>
			<td>Total</td><td>{!! toRupiah($invoice->total- $invoice->ongkir) !!}</td>
		</tr>
		<tr style='background:#f4f4f4'>
			<td>Ongkos kirim</td><td>{!! toRupiah($invoice->ongkir) !!}</td>
		</tr>
		<tr style='background:#f4f4f4;font-weight:bold;color:blue'>
			<td>GRAND TOTAL</td><td>{!! $invoice->total !!}</td>
		</tr>
	</table>

</div>



@stop

@section('footer')

<script type="text/javascript">

   $('[data-toggle="popover"]').popover({"html":true})

</script>
@stop