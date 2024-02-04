<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('checkstaff');
        $data = User::all();
        return view('layout_backend.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('checkowner');
        $data = new User();

        $data->name = $request->get('nameuser');
        $data->email = $request->get('emailuser');
        $data->password = Hash::make($request->get('passuser'));
        $data->role = $request->get('roleuser');
        $data->poin_member = $request->get('poinuser');
        $data->save();

        return redirect()->route('user-admin.index')->with('status', 'New user added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->authorize('checkowner');
        $data = User::find($id);

        $data->name = $request->get('nameuser');
        $data->email = $request->get('emailuser');
        $data->role = $request->get('roleuser');
        $data->poin_member = $request->get('poinuser');
        $data->save();

        return redirect()->route('user-admin.index')->with('status', 'Your user is already up to date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authorize('checkowner');
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user-admin.index')->with("status", "User deleted");
    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = User::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('layout_backend.user.getEditForm', compact('data'))->render()
        ));
    }
}
