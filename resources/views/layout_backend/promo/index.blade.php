@extends('layout_backend.conquer')

@section('title')
<h3 class="page-title">Daftar Promo</h3>
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
        <h4 class="modal-title">Add New Promo</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{url('promo-admin')}}">
          @csrf

          <div class="form-group">
            <label for="namecate">Name of Promo</label>
            <input type="text" name="namepro" class="form-control" id="namepro" placeholder="Enter name of promo">
            <label for="namecate">Point</label>
            <input type="text" name="point" class="form-control" id="point" placeholder="Enter point">
            <label for="namecate">Discount</label>
            <input type="text" name="disc" class="form-control" id="disc" placeholder="Enter discount">
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
    <div class="modal-content" id="showproducts">
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
        <a href="#modalCreate" data-toggle="modal" class="btn btn-success" style="margin: 1em;"> + New Promo</a>

        <table class="table mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">ID</th>
              <th class="border-bottom-0">Name</th>
              <th class="border-bottom-0">Point</th>
              <th class="border-bottom-0">Discount</th>
              <th class="border-bottom-0">Created At</th>
              <th class="border-bottom-0">Updated At</th>
              <th class="border-bottom-0">Deleted At</th>
              <th class="border-bottom-0">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($promo as $p)
            <tr>
              <td class="border-bottom-0">{{$p->id}}</td>
              <td class="border-bottom-0">{{$p->nama}}</td>
              <td class="border-bottom-0">{{$p->poin}}</td>
              <td class="border-bottom-0">{{$p->diskon}}</td>
              <td class="border-bottom-0">{{$p->created_at}}</td>
              <td class="border-bottom-0">{{$p->updated_at}}</td>
              <td class="border-bottom-0">{{$p->deleted_at}}</td>
              <td class="border-bottom-0">
                <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm('{{ $p->id }}')">Edit</a>

                <form method="POST" action="{{route('promo-admin.destroy',$p->id)}}">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Remove" class="btn btn-danger" onClick="return confirm('Do you agree to delete with {{$p->id}} - {{$p->nama}} ?');"> </input>
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
  
  function getEditForm(id) {
    $.ajax({
      type: 'POST',
      url: '{{route("promo-admin.getEditForm")}}',
      data: {
        '_token': '<?php echo csrf_token() ?>',
        'id': id
      },
      success: function(data) {
        $('#modalContent').html(data.msg)
      }
    });
  }
</script>
@endsection