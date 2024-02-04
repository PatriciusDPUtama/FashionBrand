@extends('layout_backend.conquer')

@section('title')
<h3 class="page-title">Daftar Kategori</h3>
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
        <h4 class="modal-title">Add New Category</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{url('category-admin')}}">
          @csrf

          <div class="form-group">
            <label for="namecate">Name of Category</label>
            <input type="text" name="namecate" class="form-control" id="namecate" placeholder="Enter name of category">
            <label>Image</label>
            <input type="file" class="form-control" id="imagecat" name="imagecat">
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
        <a href="#modalCreate" data-toggle="modal" class="btn btn-success" style="margin: 1em;"> + New Category</a>

        <table class="table mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">ID</th>
              <th class="border-bottom-0">Name</th>
              <th class="border-bottom-0">Image</th>
              <th class="border-bottom-0">Product</th>
              <th class="border-bottom-0">Created At</th>
              <th class="border-bottom-0">Updated At</th>
              <th class="border-bottom-0">Deleted At</th>
              <th class="border-bottom-0">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $c)
            <tr>
              <td class="border-bottom-0">{{$c->id}}</td>
              <td class="border-bottom-0">{{$c->name}}</td>

              <td class="border-bottom-0">
                <img src="{{ asset('images/' . $c->image_url) }}" style="max-width: 100%; width: 200px; height: auto;" />

                <div class="modal fade" id="modalChangeImage_{{$c->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form enctype="multipart/form-data" role="form" method="POST" action="{{route('category-admin.changeImage')}}">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                          <h4 class="modal-title">Change Image</h4>
                        </div>
                        <div class="modal-body">
                          @csrf

                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="catImage" id="catImage">
                            <input type="hidden" name="id" id="id" value="{{ $c->id }}">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-info">Submit</button>
                          <a data-dismiss="modal" class="btn btn-default">Cancel</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <br>
                <a href="#modalChangeImage_{{$c->id}}" data-toggle="modal" class="btn btn-xs btn-primary">Change Image</a>
              </td>
              <td>
                @foreach($c->products as $product)
                {{ $product->name }} <br />
                @endforeach
                <a class='btn btn-info' data-toggle='modal' data-target='#myModal' onclick="showProducts('{{ $c->id }}')">Detail</a>
              </td>
              <td class="border-bottom-0">{{$c->created_at}}</td>
              <td class="border-bottom-0">{{$c->updated_at}}</td>
              <td class="border-bottom-0">{{$c->deleted_at}}</td>
              <td class="border-bottom-0">
                <!-- <a href="{{route('category-admin.edit',$c->id)}}" class="btn btn-warning">Edit</a> -->

                <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm('{{ $c->id }}')">Edit</a>

                <form method="POST" action="{{route('category-admin.destroy',$c->id)}}">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Remove" class="btn btn-danger" onClick="return confirm('Do you agree to delete with {{$c->id}} - {{$c->name}} ?');"> </input>
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
  function showProducts(cat_id) {
    $.ajax({
      type: 'POST',
      url: '{{route("category-admin.showProducts")}}',
      data: {
        '_token': '<?php echo csrf_token() ?>',
        'id': cat_id
      },
      success: function(data) {
        $('#showproducts').html(data.msg)
      }
    });
  }

  function getEditForm(id) {
    $.ajax({
      type: 'POST',
      url: '{{route("category-admin.getEditForm")}}',
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