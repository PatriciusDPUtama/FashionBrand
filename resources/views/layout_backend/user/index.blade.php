@extends('layout_backend.conquer')

@section('title')
<h3 class="page-title">Daftar Users</h3>
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
        <h4 class="modal-title">Add New User</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{url('user-admin')}}">
          @csrf
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="nameuser" class="form-control" id="nameuser" placeholder="Enter username">
            <label>Email</label>
            <input type="email" name="emailuser" class="form-control" id="emailuser" placeholder="Enter Email">
            <label>Password</label>
            <input type="password" name="passuser" class="form-control" id="passuser" placeholder="Enter Password" minlength="8">
            <label>Role</label>
            <select id="roleuser" name="roleuser" class="form-control">
              <option value="member">Member</option>
              <option value="staff">Staff</option>
              <option value="owner">Owner</option>
            </select>
            <label>Points</label>
            <input type="number" name="poinuser" class="form-control" id="poinuser" placeholder="Enter points">
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
        @can('checkowner')
        <a href="#modalCreate" data-toggle="modal" class="btn btn-success" style="margin: 1em;"> + New User</a>
        @endcan
        <table class="table mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">ID</th>
              <th class="border-bottom-0">Name</th>
              <th class="border-bottom-0">Email</th>
              <th class="border-bottom-0">Password</th>
              <th class="border-bottom-0">Role</th>
              <th class="border-bottom-0">Member Points</th>
              <th class="border-bottom-0">Created At</th>
              <th class="border-bottom-0">Updated At</th>
              <th class="border-bottom-0">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $p)
            <tr>
              <td class="border-bottom-0">{{$p->id}}</td>
              <td class="border-bottom-0">{{$p->name}}</td>
              <td class="border-bottom-0">{{$p->email}}</td>
              <td class="border-bottom-0">###############</td>
              <td class="border-bottom-0">{{$p->role}}</td>
              <td class="border-bottom-0">{{$p->poin_member}}</td>
              <td class="border-bottom-0">{{$p->created_at}}</td>
              <td class="border-bottom-0">{{$p->updated_at}}</td>
              <td class="border-bottom-0">
                @can('checkowner')
                <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm('{{ $p->id }}')">Edit</a>

                <form method="POST" action="{{route('promo-admin.destroy',$p->id)}}">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Remove" class="btn btn-danger" onClick="return confirm('Do you agree to delete with {{$p->id}} - {{$p->nama}} ?');">
                </form>
                @endcan
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
      url: '{{route("user-admin.getEditForm")}}',
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