@if(!empty($invoice))
    @if($invoice->status == "Belum Konfirmasi")
     <a href="{!! url('checkout/confirmation/'.$invoice->kode)!!}" class='pull-right btn btn-primary shadow '>Konfirmasi Pembayaran</a>
    @endif
  
    <table class='table table-bordered'>
    	<tr>
    		<td >
    			<span class='pull-right label label-danger' style='text-align: right'> STATUS <br>{!! $invoice->status !!}</span>
    			Kode : {!! $invoice->kode !!}<br>
    			<b>{!! $invoice->name !!}</b><br>
    			<span class='pull-right' style='text-align: right;font-weight:bold;font-size:14pt'>
    				TOTAL<br>{!!$invoice->total !!}</span>
    			<small>{!! $invoice->getAddress() !!}</small>
    			
    		</td>
    	</tr>

         <tr>
                  <td>Email : <b> {!! $invoice->email !!}</b> <br> Phone: <b>{!! $invoice->handphone !!}</b></td>
                </tr>

        <tr><td>
            <b>ITEM :</b>
        <ul>
            
            @foreach($invoice->items as $val)
            <li>
            <span style='font-size:12pt'>{!! $val->name !!}</span> <span class='label label-primary'>{!! $val->qty !!} Pcs</span>
            </li>
            @endforeach
        </ul>
        </td><tr>
         @if($invoice->status == 'Menunggu Verifikasi')
        <tr>
            <td>
                <b>PEMBAYARAN :</b><br><br>
                <table class='table' style='border:none'>
                <tr>
                  <td>Metode Bayar</td><td>:</td><td>{!! $invoice->payment_method !!}</td>
                </tr>
                @if($invoice->payment_method == "Bank Transfer")
                <tr>
                  <td>Tanggal Transfer</td><td>:</td><td>{!! $invoice->transferDetail->trans_date !!}</td>
                </tr>
                <tr>
                  <td>Jumlah Transfer</td><td>:</td><td>{!! $invoice->transferDetail->trans_amount !!}</td>
                </tr>
                <tr style='background: #f9f9f9;font-weight:bold'>
                  <td>Dari Rekening</td><td>:</td><td>
                  - {!! $invoice->transferDetail->from_bank_name!!} <br>
                  - {!! $invoice->transferDetail->from_account_name!!} <br>
                  - {!! $invoice->transferDetail->from_rekening_number!!} <br>
              </td>
                </tr>
                 <tr>
                  <td>Ke Rekening </td><td>:</td><td>
                  - {!! $invoice->transferDetail->to_bank_name!!} <br>
                  - {!! $invoice->transferDetail->to_account_name!!} <br>
                  - {!! $invoice->transferDetail->to_rekening_number!!} <br>
              </td>
                </tr>
               	@endif
                </table>
            </td>
        </tr> 
        @endif

        <tr>
            <td>
                <b>KETERANGAN :</b><br><br>
                <table class='table' style='border:none'>
                <tr>
                  <td>Tanggal Konfirmasi</td><td>:</td><td>{!! ($invoice->confirmation_date!="0000-00-00") ? $invoice->confirmation_date : "Belum ada" !!}</td>
                </tr>
                <tr>
                  <td>Tanggal Verifikasi</td><td>:</td><td>{!! ($invoice->verification_date!="0000-00-00") ? $invoice->verification_date : "Belum ada" !!}</td>
                </tr>
                <tr>
                  <td>Catatan</td><td>:</td><td>{!! ($invoice->note!=null) ? $invoice->note : "Belum ada" !!}</td>
                </tr>
                </table>
            </td>
        </tr>
              
   	</table>
    @else
        <center> - data tidak ditemukan - </center>
    @endif