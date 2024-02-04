@extends('layout_backend.conquer')

@section('content')
<form method="POST" action="{{route('product-admin.update', $data->id)}}">
    @csrf
    @method("PUT")
    <div class="form-group row">
        <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-5">
            <input type="text" name="namaProduk" value="{{$data->name}}" class="form-control" id="namaProduk" placeholder="Masukkan nama produk">
        </div>
    </div>
    <div class="form-group row">
        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
        <div class="col-sm-5">
            <input type="text" name="brand" value="{{$data->brand}}" class="form-control" id="brand" placeholder="Masukkan brand produk">
        </div>
    </div>
    <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-2">
            <input type="number" name="harga" value="{{$data->harga}}" class="form-control" id="harga" min="1">
        </div>
    </div>
    <div class="form-group row">
        <label for="dimensi" class="col-sm-2 col-form-label">Dimensi</label>
        <div class="col-sm-5">
            <input type="text" name="dimensi" value="{{$data->dimensi}}" class="form-control" id="brand" placeholder="Contoh Size:S atau Size:30">
        </div>
    </div>
    <div class="form-group row">
        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-2">
            <input type="number" name="stok" value="{{$data->stok}}" class="form-control" id="stok" min="0">
        </div>
    </div>
    <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-5">
            <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" placeholder="Masukkan deskripsi produk">{{$data->description}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-5">
            {{-- <select id="kategori" name="kategori"> --}}
                @foreach($categories as $category)
                <div>
                    <input type="checkbox" id="category-{{ $category->id }}" name="categories[]" value="{{ $category->id }}" 
                    {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                </div>
                @endforeach
            {{-- </select> --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
        <div class="col-sm-5">
            <select id="tipe" name="tipe">
                @foreach ($types as $t)
                <option value="{{ $t->id }}" @if ($t->id == $data->type_id) selected @endif>{{ $t->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <a href="{{ route('product-admin.index') }}" class="btn btn-default">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    var textarea = document.getElementById("deskripsi");
    textarea.value = '{{$data->description}}';
</script>
@endsection