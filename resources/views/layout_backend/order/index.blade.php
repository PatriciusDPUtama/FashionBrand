@extends('layout_backend.conquer')

@section('title')
<h3 class="page-title">Daftar Orders</h3>
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Order</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{url('order-admin')}}">
          @csrf

          <div class="form-group">
            <label>User</label>
            <select id="userorder" name="userorder" class="form-control">
                @foreach ($users as $u)
                <option value="{{$u->id}}">{{$u->name}}</option>
                @endforeach
            </select>
            <label>Promo</label>
            <select id="promoorder" name="promoorder" class="form-control">
                @foreach ($promos as $p)
                <option value="{{$p->id}}">{{$p->nama}}</option>
                @endforeach
            </select>
            <label>Products</label>
            @foreach ($products as $p)
            <div>
            <input type="checkbox" name="productorder[]" id="check{{$p->id}}"value="{{$p->id}}" class="form-control"><label>{{$p->name}}</label>
            <input type="number" name="quantity{{$p->id}}" class="form-control" placeholder="Quantity">
            </div>
            @endforeach
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a data-dismiss="modal" class="btn btn-default">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- modal blank show product --}}
<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
       <div class="modal-content" id="orderDetail">
         <!--loading animated gif can put here-->
       </div>
    </div>
  </div>

<!-- Untuk button ubahTypeB -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide" style="margin-left: auto; margin-right: auto; max-width: 700px;">
        <div class="modal-content">
            <div class="modal-body" id="modalContent">

            </div>
        </div>
    </div>
</div>

<div class="d-flex align-items-strech">
  <div class="card w-100">
    <div class="card-body p-4">
      <div class="table-responsive">
        <!-- <a href="{{route("category-admin.create")}}" class="btn btn-primary" style="margin: 1em">+ Add Category</a> -->
        @can('checkowner')
        <a href="#modalCreate" data-toggle="modal" class="btn btn-success" style="margin: 1em;"> + New Order</a>    
        @endcan
        <table class="table mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">ID</th>
              <th class="border-bottom-0">User</th>
              <th class="border-bottom-0">Promo</th>
              <th class="border-bottom-0">Created At</th>
              <th class="border-bottom-0">Updated At</th>
              <th class="border-bottom-0">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $p)
            <tr>
              <td class="border-bottom-0">{{$p->id}}</td>
              <td class="border-bottom-0">{{$p->user->name}}</td>
              @if ($p->promo)
              <td class="border-bottom-0">{{$p->promo->nama}}</td>
              @else
              <td class="border-bottom-0">-</td>
              @endif
              <td class="border-bottom-0">{{$p->created_at}}</td>
              <td class="border-bottom-0">{{$p->updated_at}}</td>
              <td class="border-bottom-0">
                <a href = "#" data-toggle='modal' data-target='#myModal' onclick="getDetailOrders({{$p->id}});" class="btn btn-info">Details</a>
                {{-- <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm('{{ $p->id }}')">Edit</a> --}}
                <form method="POST" action="{{route('promo-admin.destroy',$p->id)}}">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Remove" class="btn btn-danger" onClick="return confirm('Do you agree to delete with {{$p->id}} - {{$p->nama}} ?');">
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script>

function getDetailOrders(id) {
        $.ajax({
            type:'POST',
            url:'{{route("order-admin.getOrderForm")}}',
            data:'_token= <?php echo csrf_token() ?> &id='+id,
            success:function(data) {
                $("#orderDetail").html(data.msg);
            }
        });
    }


</script>
@endsection