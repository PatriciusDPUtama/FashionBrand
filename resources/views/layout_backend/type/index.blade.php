@extends('layout_backend.conquer')

@section('title')
<h3 class="page-title">Daftar Tipe</h3>
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="alert alert-success" id="message" style="display: none;"></div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Type</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" role="form" method="POST" action="{{url('type-admin')}}">
                    @csrf

                    <div class="form-group">
                        <label for="nametype">Name of Type</label>
                        <input type="text" name="nametype" class="form-control" id="nametype" placeholder="Enter name of type">
                        <label>Image</label>
                        <input type="file" class="form-control" id="imagetype" name="imagetype">
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

<!-- Untuk button ubahTypeB -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide" style="margin-left: auto; margin-right: auto; max-width: 700px;">
        <div class="modal-content">
            <div class="modal-body" id="modalContent">

            </div>
        </div>
    </div>
</div>

<a href="#modalCreate" data-toggle="modal" class="btn btn-success" style="margin-bottom: 10px;"> + New Type</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Product</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th>Action</th>
    </tr>

    @foreach ($data as $d)
    <tr id="tr_{{$d->id}}">
        <td>{{ $d->id }}</td>
        <td id="td_name_{{$d->id}}">{{ $d->name }}</td>
        <td>
            <img src="{{ asset('images/' . $d->image_url) }}" style="max-width: 100%; width: 200px; height: auto;" />

            <div class="modal fade" id="modalChangeImage_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" role="form" method="POST" action="{{route('type-admin.changeImage')}}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Change Image</h4>
                            </div>
                            <div class="modal-body">
                                @csrf

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="typeImage" id="typeImage">
                                    <input type="hidden" name="id" id="id" value="{{ $d->id }}">
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
            <a href="#modalChangeImage_{{$d->id}}" data-toggle="modal" class="btn btn-xs btn-primary">Change Image</a>
        </td>
        <td>
            @foreach($d->products as $product)
            {{ $product->name }} <br />
            @endforeach
            <a class='btn btn-info' data-toggle='modal' data-target='#myModal' onclick="showProducts('{{ $d->id }}')">Detail</a>
        </td>
        <td>{{ $d->created_at }}</td>
        <td>{{ $d->updated_at }}</td>
        <td>{{ $d->deleted_at }}</td>
        <td>
            <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm('{{ $d->id }}')">Edit</a>

            <a href="#" class="btn btn-danger" onclick="if(confirm('Are You sure want to delete {{ $d->id }} - {{ $d->name }}?')) deleteDataRemoveTR('{{ $d->id }}')">Remove</a>
        </td>
    </tr>
    @endforeach
</table>

{{-- modal blank show product --}}
<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content" id="showproducts">
            <!--loading animated gif can put here-->
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function showProducts(type_id) {
        $.ajax({
            type: 'POST',
            url: '{{route("type-admin.showProducts")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': type_id
            },
            success: function(data) {
                $('#showproducts').html(data.msg)
            }
        });
    }

    function getEditForm(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("type-admin.getEditForm")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                $('#modalContent').html(data.msg)
            }
        });
    }

    function deleteDataRemoveTR(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("type-admin.deleteData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                if (data.status == 'oke') {
                    $('#message').html(data.msg);
                    $('#tr_' + id).remove();
                    showDivMessage();
                }
            }
        });
    }

    function showDivMessage() {
        var messageDiv = document.getElementById("message");
        messageDiv.style.display = "block";
    }
</script>
@endsection