<form method="POST" action="{{route('type-admin.update', $data->id)}}">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="nametype">Name of Type</label>
        <input type="text" name="nametype" class="form-control" id="nametype" value="{{$data->name}}" aria-describedby="nameHelp" placeholder="Enter name of type">
        <small id="nameHelp" class="form-text">Please write down your data here</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>