@if(Cart::count()>0)
  @foreach (Cart::content() as $key => $value) 
        <div class='row' style='border-bottom:1px solid blue'>
        <div class='col-xs-4'><img src='http://localhost/dcodress/public/product/sunday-outfit.jpg' width='100%' /></div>
        <div class='col-xs-8'>
          <table class='table'>
          <tr>
          <td>Nama Set</td><td>:</td><td><strong>{!! $value->name !!}</strong></td>
          </tr>
          <tr>
          <td>Harga</td><td>:</td><td><strong>{!! toRupiah($value->price) !!} </strong></td>
          </tr>
          <tr>
          <td>Berat</td><td>:</td><td><strong>{!! $value->options->weight !!} gram</strong></td>
          </tr>
          <tr>
            <td colspan='3'><a href='#' class='hapus-btn' data-rowid = '{!! $value->rowid !!}'> <i class='fa fa-trash'></i> Hapus</a></td>
          </tr>
        </table>
        </div>
        </div>
  @endforeach
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
              echo "*gratis ongkos kirim (max Rp. 25.000,-)";
            }
          ?>
        </td></tr>
        <tr style='background:#f5f5f5;font-size:18pt'><td><strong>GRAND TOTAL<strong></td><td style='color:red'><strong>{!! toRupiah(Cart::total() + $ongkir) !!}<strong></td></tr>
      </table> 
