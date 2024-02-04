<div class="modal-header">
    <h5 class="modal-title">Order Details</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="card-deck">
        <?php $sumTotPrice = 0;?>
    @foreach ($dataProduk as $p)
        <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="{{asset('images/'.$p->image_url)}}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><u>Product Name</u></p>
            <p>{{$p->name}}</p>
            <p class="card-text"><u>Product Price</u></p>
            <p>Rp. {{ number_format($p->harga, 2, ',', '.') }}</p>
            <p class="card-text"><u>Product Quantity</u></p>
            <p>{{$p->pivot->quantity}}</p>
            <p class="card-text"><u>Total Price</u></p>
            <p>Rp. {{number_format($p->pivot->total, 2, ',', '.')}}</p>
            <?php $sumTotPrice += $p->pivot->total?>
        </div>
      </div>
    @endforeach
    <div class="card">
        <div class="card-body">
            <p><u>Sub total</u></p>
            <p>Rp. <?php echo(number_format($sumTotPrice, 2, ',', '.')) ?></p>
    
            @if ($data->promo)
            <p><u>Promo code</u></p>
            <p>{{$data->promo->nama}}</p>
            <p><u>Discount</u></p>
            <p>{{$data->promo->diskon}}%</p>
            @endif
            
            <p><u>Tax cost</u></p>
            <p>Rp. {{number_format(11*$sumTotPrice/100, 2, ',', '.')}}</p>
            <p><u>Grand total</u></p>
            @if ($data->promo)
            <p>Rp. {{number_format($sumTotPrice - (($data->promo->diskon)*$sumTotPrice/100) + (11*$sumTotPrice/100), 2, ',', '.')}}</p>
            @else
            <p>Rp. {{number_format($sumTotPrice + (11*$sumTotPrice/100), 2, ',', '.')}}</p>
            @endif
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>