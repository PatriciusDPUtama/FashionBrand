@extends('layout_backend.conquer')

@section('content')
<form enctype="multipart/form-data" role="form" method="POST" action="{{url('product-admin')}}">
    @csrf
    <div class="form-group row">
        <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-5">
            <input type="text" name="namaProduk" class="form-control" id="namaProduk" placeholder="Masukkan nama produk" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
        <div class="col-sm-5">
            <input type="text" name="brand" class="form-control" id="brand" placeholder="Masukkan brand produk" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-2">
            <input type="number" name="harga" class="form-control" id="harga" min="1" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="dimensi" class="col-sm-2 col-form-label">Dimensi</label>
        <div class="col-sm-5">
            <input type="text" name="dimensi" class="form-control" id="brand" placeholder="Contoh Size:S atau Size:30" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-2">
            <input type="number" name="stok" class="form-control" id="stok" min="0" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="imageproduct" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-5">
            <input type="file" class="form-control" id="imageproduct" name="imageproduct" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-5">
            <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" placeholder="Masukkan deskripsi produk" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-5">
            {{-- <select id="kategori" name="kategori"> --}}
                @foreach ($categories as $c)
                <input type="checkbox" name="kategori[]" value="{{$c->id}}">{{$c->name}}
                {{-- <option value="{{ $c->id }}">{{ $c->name }}</option> --}}
                @endforeach
            {{-- </select> --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
        <div class="col-sm-5">
            <select id="tipe" name="tipe">
                @foreach ($types as $t)
                <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <a href="{{ route('product-admin.index') }}" class="btn btn-default">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection