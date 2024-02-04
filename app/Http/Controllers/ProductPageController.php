<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Type;
use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductPageController extends Controller
{
    //
    public function index()
    {
        $products=Product::all();
        $types=Type::all();
        $categories=Category::all();
        return view('layout_template.product-list',['data'=>$products,'products'=>$products,'types'=>$types, 'categories'=>$categories]);
    }
    public function detail($id)
    {
        $types=Type::all();
        $data=Product::find($id);
        $products=Product::all();
        $categories=Category::all();
        return view('layout_template.product-detail',['data'=>$data,'products'=>$products,'types'=>$types, 'categories'=>$categories]);
    }
    public function list($id)
    {
        $products=Product::all();
        $types=Type::all();
        $categories=Category::all();
        $category_product = Category::find($id);
        $data = $category_product->products;
        return view('layout_template.product-list', ['data' => $data, 'categories'=>$categories, 'types'=>$types, 'products'=>$products]);
    }
    public function listType($id)
    {
        $products=Product::all();
        $types=Type::all();
        $categories=Category::all();
        $data = Product::listProdFromType($id);
        return view('layout_template.product-list', ['data' => $data, 'categories'=>$categories, 'types'=>$types, 'products'=>$products]);
    }

    public function cart()
    {
        return view('layout_template.cart');
    }

    public function addToCartWithQuantity(){
        $id = $_POST["id"];
        
        $p = Product::find($id);
        $quantity = $_POST["quantity"];
        if($p->stok<= 0)
        {
            return redirect()->back()->with('fail',"Stock Unavailable");
        }
        else
        {
            $cart = session()->get('cart');
            if(!isset($cart[$id]))
            {
                $cart[$id]=[
                    "name"=>$p->name,
                    "quantity"=>$quantity,
                    "price"=>$p->harga,
                    "photo"=>$p->image_url,
                    "total"=> $p->harga
                ];
            }
            else{

                if($cart[$id]["quantity"]>$p->stok)
                {
                    
                }
                else{

                    $cart[$id]["quantity"]++;
                    $cart[$id]['total'] = $cart[$id]["quantity"] * $cart[$id]["price"];
                }
                
            }
            session()->put('cart',$cart);
            return redirect()->back()->with('success',"Horray");
        }
        
    }

    public function addToCart($id){
        $p = Product::find($id);
        if($p->stok<= 0)
        {
            return redirect()->back()->with('fail',"Stock Unavailable");
        }
        else
        {
            $cart = session()->get('cart');
            if(!isset($cart[$id]))
            {
                $cart[$id]=[
                    "name"=>$p->name,
                    "quantity"=>1,
                    "price"=>$p->harga,
                    "photo"=>$p->image_url,
                    "total"=> $p->harga
                ];
            }
            else{

                if($cart[$id]["quantity"]>$p->stok)
                {
                    
                }
                else{

                    $cart[$id]["quantity"]++;
                    $cart[$id]['total'] = $cart[$id]["quantity"] * $cart[$id]["price"];
                }
                
            }
            session()->put('cart',$cart);
            return redirect()->back()->with('success',"Horray");
        }
        
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart',$cart);
        return redirect()->back()->with('success',"Horray");
    }

    public function addQuantity()
    {
        $p = Product::find($_POST["id"]);
        $cart = session()->get('cart');
        if($p->stok < $cart[$_POST["id"]]["quantity"])
        {

        }
        else{

            $cart[$_POST["id"]]["quantity"]++;
            $cart[$_POST["id"]]['total'] = $cart[$_POST["id"]]["quantity"] * $cart[$_POST["id"]]["price"];
            session()->put('cart',$cart);
            return response()->json(array(
                'status'=>'oke',
                "total"=>$cart[$_POST["id"]]['total']
              ),200);
        }
        
    }

    public function reduceQuantity()
    {
        $cart = session()->get('cart');
        $cart[$_POST["id"]]["quantity"]--;
        $cart[$_POST["id"]]['total'] = $cart[$_POST["id"]]["quantity"] * $cart[$_POST["id"]]["price"];
        session()->put('cart',$cart);
        return response()->json(array(
            'status'=>'oke',
            "total"=>$cart[$_POST["id"]]['total']
          ),200);
    }

    public function countTotalAll()
    {
        $cart = session()->get('cart');
        $subTotal = 0;
        foreach ($cart as $value) {
            $subTotal += $value['total'];
        }
        return response()->json(array(
            'status'=>'oke',
            "total"=>$subTotal
          ),200);
    }

    public function checkout()
    {
        return view('layout_template.checkout');
    }

    public function confirmCheckout()
    {
        $userid = Auth::user()->id;
        $promoSession = session()->get('promo');
        $data = new Order();
        $poinPromo = 0;
        if(!isset($promoSession))
        {
            $data->user_id = $userid;
            $data->save();
        }
        else
        {
            $data->user_id = $userid;
            $data->promo_id = $promoSession['id'];
            $poinPromo = $promoSession['poin'];
            $data->save();

        }
        $total = 0;
        $cart = session()->get('cart');
        foreach ($cart as $key => $value) {
            $total += $value['total'];
            $data->products()->attach($key, ['quantity' => $value['quantity'],'total'=>$value['total']]);
        }

        foreach ($data->products as $p) {
            $p->stok = $p->stok - $cart[$p->id]['quantity'];
            $p->save();
        }

        $poins = intdiv($total,1000000);
        $user = User::find($userid);
        $user->poin_member = $user->poin_member + $poins - $poinPromo;
        $user->save();

        session()->forget(['cart', 'promo']);     

        return redirect('/history');  

    }

    public function applyPromo() {
        $userid = Auth::user()->id;
        $user = User::find($userid);

        $cart = session()->get('cart');
        $subTotal = 0;
        foreach ($cart as $value) {
            $subTotal += $value['total'];
        }
        $cart = session()->get('cart');
        $subTotal = 0;
        foreach ($cart as $value) {
            $subTotal += $value['total'];
        }

        $poinUser = $user['poin_member'];
        $code = $_POST['promo'];
        $p = DB::table('promos')
        ->where('nama', '=', $code)
        ->where('poin','<=',$poinUser)
        ->first();

        $promoSession = session()->get('promo');
        $promoSession=[
                "id"=>$p->id,
                "nama"=>$p->nama,
                "poin"=>$p->poin,
                "diskon"=>$p->diskon
            ];
        session()->put('promo',$promoSession);

        if($p!=null)
        {
            return response()->json(array(
                'status'=>'oke',
                "discount"=>$p->diskon,
                "total"=>$subTotal
              ),200);
        }
        else{
            return response()->json(array(
                'status'=>'fail',
              ),200);
        }
    }

}
