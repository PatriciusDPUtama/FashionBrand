@extends('layout_backend.conquer')

@section('content')

@section('title')
<h3 class="page-title">Daftar Produk</h3>
@endsection

@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="alert alert-success" id="message" style="display: none;"></div>

<a href="{{route('product-admin.create')}}" class="btn btn-success" style="margin-bottom: 10px;"> + New Product</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Image</th>
        <th>Brand</th>
        <th>Harga</th>
        <th>Dimensi</th>
        <th>Stok</th>
        <th>Deskripsi</th>
        <th>Category</th>
        <th>Type</th>
        <th>Action</th>
    </tr>

    @foreach ($prods as $p)
    <tr id="tr_{{$p->id}}">
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td>
        <td>
            <img src="{{ asset('images/' . $p->image_url) }}" style="max-width: 100%; width: 200px; height: auto;" />

            <div class="modal fade" id="modalChangeImage_{{$p->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" role="form" method="POST" action="{{route('product-admin.changeImage')}}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Change Image</h4>
                            </div>
                            <div class="modal-body">
                                @csrf

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="productImage" id="productImage">
                                    <input type="hidden" name="id" id="id" value="{{ $p->id }}">
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
            <a href="#modalChangeImage_{{$p->id}}" data-toggle="modal" class="btn btn-xs btn-primary">Change Image</a>
        </td>
        <td>{{ $p->brand }}</td>
        <td>Rp. {{ number_format($p->harga, 2, ',', '.') }}</td>
        <td>{{ $p->dimensi }}</td>
        <td>{{ $p->stok }}</td>
        <td>{{ $p->description }}</td>
        <td>@if($p->categories)
            @foreach ($p->categories as $c)
            {{$c->name}}  
            @endforeach
            @endif
        </td>
        <td>{{ $p->type->name }}</td>
        <td>
            <a class='btn btn-warning' href="{{ route('product-admin.edit', $p->id) }}">Edit</a>

            <a href="#" class="btn btn-danger" onclick="if(confirm('Are You sure want to delete {{ $p->id }} - {{ $p->name }}?')) deleteDataRemoveTR('{{ $p->id }}')">Remove</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection

@section('javascript')
<script>
    function deleteDataRemoveTR(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("product-admin.deleteData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'idProduct': id
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