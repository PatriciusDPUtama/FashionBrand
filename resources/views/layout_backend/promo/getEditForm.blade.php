<form method="POST" action="{{route('promo-admin.update', $data->id)}}">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="namecat">Name of Promo</label>
        <input type="text" name="namepro" class="form-control" id="namepro" value="{{$data->nama}}" aria-describedby="nameHelp" placeholder="Enter name of promo">
        <small id="nameHelp" class="form-text">Please write down your data here</small>

        <label for="namecat">Point</label>
        <input type="text" name="point" class="form-control" id="point" value="{{$data->poin}}" aria-describedby="nameHelp" placeholder="Enter point of promo">
        <small id="nameHelp" class="form-text">Please write down your data here</small>

        <label for="namecat">Discount</label>
        <input type="text" name="disc" class="form-control" id="disc" value="{{$data->diskon}}" aria-describedby="nameHelp" placeholder="Enter discount">
        <small id="nameHelp" class="form-text">Please write down your data here</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>