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
      <img src="{!! url($value->options->detail->thumb) !!}" style='width:100%'  />
      </div>
      <div class='col-md-8'>
      <h3><a href='{!! url("butik/".$value->options->detail->id) !!}'>{!! $value->name !!}</a></h3>
      Berat : {!! $value->options->detail->weight !!} gram
    </div>
    <div class='col-md-1'>
 <a href='#' class='hapus-btn pull-right' data-id = '{!! $value->rowid !!}'><i class='fa fa-close'></i></a>
    </div>
    </td>
    
    <td>{!! toRupiah($value->price) !!}</td>
    <td><input type='number' value="{!! $value->qty !!}" min='1' class='qtyInput form-control' style='width:100px' data-id = '{!! $value->rowid !!}' /></td>
    <td>{!! toRupiah($value->subtotal) !!}</td>
  </tr>
  @endforeach
</tbody>

        </table>
<script type="text/javascript">
$(".checkout-btn").show();

</script>
  
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
             $ongkir = 0;
            if(Session::has('ongkir')){
                $ongkir = Session::get('ongkir');
                if($ongkir>0){
                  echo toRupiah($ongkir);
                }else{
                  if($ongkir == -25000){
                    echo "ongkos kirim belum terdefinisi";
                  }else{
                   
                    echo "- GRATIS -";
                  }
                }
            }else{
              echo "belum dihitung..";
            }
          ?>
        </td></tr>
        <tr style='background:#f5f5f5;font-size:18pt'><td><strong>GRAND TOTAL<strong></td><td style='color:red'><strong>{!! toRupiah(Cart::total() + $ongkir) !!}<strong></td></tr>
      </table> 
