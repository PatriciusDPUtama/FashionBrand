<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        $data = Type::all();
        return view('layout_backend.type.index', compact('data'));
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
        $data = new Type();

        $file = $request->file('imagetype');
        $imgFolder = 'images';
        $imgFile = time() . "_" . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->image_url = $imgFile;

        $data->name = $request->get('nametype');
        // $data->image_url = $request->get('imageurltype');
        $data->save();
        return redirect()->route('type-admin.index')->with('status', 'Added a new type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Type::find($id);
        $data->name = $request->get('nametype');
        $data->save();
        return redirect()->route('type-admin.index')->with('status', 'Your type is already up to date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }

    public function showProducts()
    {
        $type = Type::find($_POST['id']);
        $nama = $type->name;
        $data = $type->products;
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('layout_backend.type.showProducts', compact('nama', 'data'))->render()
        ), 200);
    }

    public function deleteData(Request $request)
    {
        $id = $request->get('id');
        $data = Type::find($id);
        $data->name = $request->get('name');
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type is removed'
        ), 200);
    }
    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Type::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('layout_backend.type.getEditForm', compact('data'))->render()
        ));
    }

    public function changeImage(Request $request)
    {
        $id = $request->get('id');
        $file = $request->file('typeImage');
        $imgFolder = 'images';
        $imgFile = time() . "_" . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $Type = Type::find($id);
        $Type->image_url = $imgFile;
        $Type->save();
        return redirect()->route('type-admin.index')->with('status', 'Type image is changed');
    }
}
