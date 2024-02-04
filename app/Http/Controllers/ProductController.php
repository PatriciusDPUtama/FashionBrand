<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->authorize('checkstaff');
        $products = Product::all();

        return view('layout_backend.product.index', ['prods' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Fungsi Create untuk menampilkan form Add Product
        $categories = Category::all();
        $types = Type::all();

        return view('layout_backend.product.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Methodnya POST untuk menyimpan data (ketika pengguna menyimpan tombol simpan)
        // dd($request->all());
        $data = new Product();

        $file = $request->file('imageproduct');
        $imgFolder = 'images';
        $imgFile = time() . "_" . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->image_url = $imgFile;

        $data->name = $request->get('namaProduk');
        $data->brand = $request->get('brand');
        $data->harga = $request->get('harga');
        $data->dimensi = $request->get('dimensi');
        $data->stok = $request->get('stok');
        $data->description = $request->get('deskripsi');
        $data->type_id = $request->get('tipe');

        $data->save();
        $categories = $request->get('kategori');
        foreach($categories as $cid)
        {
            $c = Category::find($cid);
            $data->categories()->attach($c->id);
        }
        return redirect()->route('product-admin.index')->with('status', 'Horray!!Your new Product data is already inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan form edit
        $objProduct = Product::find($id);

        $categories = Category::all();
        $types = Type::all();

        $selectedCategories = $objProduct->categories->pluck('id')->toArray();

        $data = $objProduct;
        
        return view('layout_backend.product.edit', compact('data', 'categories', 'types','selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Menyimpan
        $objProduct = Product::find($id);
        $objProduct->name = $request->get('namaProduk');
        $objProduct->brand = $request->get('brand');
        $objProduct->harga = $request->get('harga');
        $objProduct->dimensi = $request->get('dimensi');
        $objProduct->stok = $request->get('stok');
        $objProduct->description = $request->get('deskripsi');
        $objProduct->type_id = $request->get('tipe');
        $objProduct->save();

        $objProduct->categories()->detach();
        $categories = $request->get('categories');
        foreach($categories as $cid)
        {
            $c = Category::find($cid);
            $objProduct->categories()->attach($c->id);
        }

        return redirect()->route('product-admin.index')->with('status', 'Your Product is already up-to-date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function deleteData(Request $request)
    {
        $id = $request->get('idProduct');
        $data = Product::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Product is removed'
        ), 200);
    }

    public function changeImage(Request $request)
    {
        $id = $request->get('id');
        $file = $request->file('productImage');
        $imgFolder = 'images';
        $imgFile = time() . "_" . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $Product = Product::find($id);
        $Product->image_url = $imgFile;
        $Product->save();
        return redirect()->route('product-admin.index')->with('status', 'Product image is changed');
    }
}
