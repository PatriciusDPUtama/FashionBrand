@extends('layout_template.eshophome')
@section('content')
@csrf
<div class="cart-page">
    <div class="container-fluid">
        <div class="col-lg-8">
            <div class="cart-page-inner">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Grand Total</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($orders as $o)
                            <tr>
                                <td>
                                    {{$loop->index + 1}}
                                </td>
                                <td>
                                    {{$o->id}}
                                </td>
                                <td>
                                    <?php $sumTotPrice = 0 ?>
                                    @foreach ($o->products as $p)   
                                    <?php $sumTotPrice += $p->pivot->total?>
                                    @endforeach
                                    @if ($o->promo)
                                    Rp. {{number_format($sumTotPrice - (($o->promo->diskon)*$sumTotPrice/100) + (11*$sumTotPrice/100),2, ',', '.')}}
                                    @else
                                    Rp. {{ number_format($sumTotPrice + (11*$sumTotPrice/100), 2, ',', '.') }}
                                    @endif
                                </td>
                                <td>
                                    <a href = "#" data-toggle='modal' data-target='#myModal' onclick="getDetailOrders({{$o->id}});" class="btn btn-info"><i class="fas fa-file-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
       <div class="modal-content" id="orderDetail">
         <!--loading animated gif can put here-->
       </div>
    </div>
  </div>

@endsection

@section('javascript')
<script>

function getDetailOrders(id) {
        $.ajax({
            type:'POST',
            url:'{{route("getDetailOrders")}}',
            data:'_token= <?php echo csrf_token() ?> &id='+id,
            success:function(data) {
                $("#orderDetail").html(data.msg);
            }
        });
    }

</script>
@endsection