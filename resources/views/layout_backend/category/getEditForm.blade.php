<form method="POST" action="{{route('category-admin.update', $data->id)}}">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="namecat">Name of Category</label>
        <input type="text" name="namecat" class="form-control" id="namecat" value="{{$data->name}}" aria-describedby="nameHelp" placeholder="Enter name of category">
        <small id="nameHelp" class="form-text">Please write down your data here</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>