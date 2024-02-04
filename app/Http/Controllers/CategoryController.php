<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('checkstaff');
        $category = Category::all();
        return view('layout_backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('layout_backend.category.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();

        $file = $request->file('imagecat');
        $imgFolder = 'images';
        $imgFile = time() . "_" . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->image_url = $imgFile;

        $data->name = $request->get('namecate');
        $data->save();
        return redirect()->route('category-admin.index')->with('status', 'New category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('layout_backend.category.updatecategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $data->name = $request->get('namecat');
        $data->save();
        return redirect()->route('category-admin.index')->with('status', 'Your category is already up to date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category-admin.index')->with("status", "Category deleted");
    }

    public function showProducts()
    {
        $category = Category::find($_POST['id']);
        $nama = $category->name;
        $data = $category->products;
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('layout_backend.category.showProducts', compact('nama', 'data'))->render()
        ), 200);
    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('layout_backend.category.getEditForm', compact('data'))->render()
        ));
    }

    public function changeImage(Request $request)
    {
        $id = $request->get('id');
        $file = $request->file('catImage');
        $imgFolder = 'images';
        $imgFile = time() . "_" . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $Category = Category::find($id);
        $Category->image_url = $imgFile;
        $Category->save();
        return redirect()->route('category-admin.index')->with('status', 'Category image is changed');
    }
}
