@extends('template')

@section('content')



<div class='col-md-6 col-lg-offset-3' style='border:1px solid #c0c0c0; padding:20px'>
    @if(!empty($invoice))
    
    <h3 style='border-bottom:1px dashed black ' class='checkout-form-title'>Transaksi Kamu</h3>
    <br>
    <table class='table table-bordered'>
      <tr>
        <td >
          <span class='pull-right label label-danger' style='text-align: right'> STATUS <br>{!! $invoice->status !!}</span>
          Kode : {!! $invoice->kode !!}<br>
          <b>{!! $invoice->name !!}</b><br>
          <span class='pull-right' style='text-align: right;font-weight:bold;font-size:14pt'>
            TOTAL<br>{!! $invoice->total !!}</span>
          <small>{!! $invoice->getAddress() !!}</small>
          
        </td>
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
                <tr style='background: aqua'>
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
               <br><br>
                <table class='table' style='border:none'>
                <tr>
                  <td width='40%'><strong>Konfirmasi </strong></td>
                  <td>
                  @if($invoice->confirmation_date!="0000-00-00")
                    <i class='fa fa-check'></i> Sudah
                  @else
                    <i class='fa fa-close'></i> Belum 
                  @endif
                  </td>
                  <td>
                  @if($invoice->status == "Belum Konfirmasi")
                   <a href="{!! url('butik/payment/'.$invoice->kode) !!}" class=''>Konfirmasi Sekarang ?</a>
                    
                  @else
                   {!! $invoice->confirmation_date !!}
                  @endif
                  </td>
                </tr>
                <tr>
                  <td> <strong>Verifikasi </strong></td>
                   <td>
                  @if($invoice->verification_date!="0000-00-00")
                    <i class='fa fa-check'></i> Sudah
                  @else
                    <i class='fa fa-close'></i> Belum 
                  @endif
                  </td>
                  <td>
                  @if($invoice->status == "Barang Dalam Pengiriman")
                    {!! $invoice->verification_date !!}
                  @else
                    
                  @endif
                  </td>
                </tr>
                <tr>
                  
                  <td> <strong>Catatan </strong></td><td colspan="2">{!! ($invoice->note!=null) ? $invoice->note : "Tidak Ada" !!}
                  
                </td>
                </tr>
                </table>
            </td>
        </tr>        
    </table>
    @else
        <center> - Maaf no.transaksi atau email anda salah - </center>
    @endif
    
</div>
@stop

@section("footer")
<script type="text/javascript">


</script>
@stop