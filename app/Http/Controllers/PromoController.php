<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('checkstaff');
        
        $promo = Promo::all();
        return view('layout_backend.promo.index', compact('promo'));
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
        $data = new Promo();

        $data->nama = $request->get('namepro');
        $data->poin = $request->get('point');
        $data->diskon = $request->get('disc');
        $data->save();
        return redirect()->route('promo-admin.index')->with('status', 'New promo added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Promo::find($id);
        $data->nama = $request->get('namepro');
        $data->poin = $request->get('point');
        $data->diskon = $request->get('disc');
        $data->save();
        return redirect()->route('promo-admin.index')->with('status', 'Your promo is already up to date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::find($id);
        $promo->delete();
        return redirect()->route('promo-admin.index')->with("status", "Promo deleted");
    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Promo::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('layout_backend.promo.getEditForm', compact('data'))->render()
        ));
    }
}
