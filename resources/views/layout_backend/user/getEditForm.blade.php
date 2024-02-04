<form method="POST" action="{{route('user-admin.update', $data->id)}}">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="nameuser" class="form-control" id="nameuser" placeholder="Enter username" value={{$data->name}}>
        <label>Email</label>
        <input type="email" name="emailuser" class="form-control" id="emailuser" placeholder="Enter Email" value={{$data->email}}>
        <label>Password</label>
        <input type="password" name="passuser" class="form-control" id="passuser" placeholder="Enter Password" minlength="8" value="aaaaaaaaaa" disabled>
        <label>Role</label>
        <select id="roleuser" name="roleuser" class="form-control">
            @if ($data->role='member')
            <option value="member" active>Member</option>
            <option value="staff">Staff</option>
            <option value="owner">Owner</option>
            @elseif ($data->role='staff')
            <option value="member">Member</option>
            <option value="staff" active>Staff</option>
            <option value="owner">Owner</option>
            @else
            <option value="member">Member</option>
            <option value="staff">Staff</option>
            <option value="owner" active>Owner</option>
            @endif
          
        </select>
        <label>Points</label>
        <input type="number" name="poinuser" class="form-control" id="poinuser" placeholder="Enter points" value={{$data->poin_member}}>
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>