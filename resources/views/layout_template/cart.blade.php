@extends('layout_template.eshophome')
@section('content')
@csrf
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @if(session('cart'))
                                            @foreach (session('cart') as $id=>$details)   
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{asset('images/'.$details['photo'])}}" alt="Image"></a>
                                                    <p>{{$details['name']}}</p>
                                                </div>
                                            </td>
                                            <td>Rp. {{ number_format($details['price'], 2, ',', '.')}}</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus" onclick="reduceQuantity({{$id}})"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{$details['quantity']}}">
                                                    <button class="btn-plus" onclick="addQuantity({{$id}})"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td id="total{{$id}}">Rp. {{ number_format($details['total'], 2, ',', '.') }}</td>
                                            <td><a class="btn" href="{{route('removeFromCart',$id)}}"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        {{-- <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="img/product-2.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="img/product-3.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="img/product-4.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="img/product-5.jpg" alt="Image"></a>
                                                    <p>Product Name</p>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span id="subTotal">
                                            </span></p>
                                            <p>Tax cost 11%<span id="tax"></span></p>
                                            <p>Promo<span id="promo"></span></p>
                                            <h2>Grand Total<span id="grandTotal"></span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            @if(session('cart'))
                                            <a href="/checkout"><button>Checkout</button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
@endsection

@section('javascript')
<script>
function addQuantity(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("addQuantity")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id
         },
    success: function(data){
        $('#total'+id).html(data.total)
        countTotal()
    }
  });
}

function reduceQuantity(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("reduceQuantity")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id
         },
    success: function(data){
        $('#total'+id).html(data.total)
        countTotal()
    }
  });
}

window.onload = function() {countTotal()};

function countTotal()
{
    $.ajax({
    type:'POST',
    url:'{{route("countTotalAll")}}',
    data:{'_token':'<?php echo csrf_token() ?>'
         },
    success: function(data){
        // $('#subTotal').html(data.total)
        // $('#tax').html(data.total*11/100)
        // $('#grandTotal').html(data.total + (data.total*11/100))

        var options = { style: 'decimal', useGrouping: true };
        var subTotalFormatted = data.total.toLocaleString('id', options);
        var taxFormatted = (data.total * 11 / 100).toLocaleString('id', options);
        var grandTotalFormatted = (data.total + (data.total * 11 / 100)).toLocaleString('id', options);

        $('#subTotal').html(subTotalFormatted);
        $('#tax').html(taxFormatted);
        $('#grandTotal').html(grandTotalFormatted);
    }
  });
}
</script>
@endsection