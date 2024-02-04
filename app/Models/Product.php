<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function orders()
    {
        return $this->belongsToMany(Order::class,'transactions','product_id','order_id')->withPivot('quantity','total');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'categoriesproducts','product_id','category_id');
    }

    public function categoriesWithTrashed()
    {
        return $this->belongsToMany('App\Models\Category')->withTrashed();
        // return $this->belongsTo(Category::class)->withTrashed();
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function typeWithTrashed()
    {
        return $this->belongsTo(Type::class)->withTrashed();
    }
    public static function listProducts($id)
    {
        $products = self::join('categories', 'products.category_id', 'categories.id')
            ->where('categories.id', $id)
            ->select('products.id', 'products.name', 'products.brand','products.harga','products.image_url','products.description', 'products.created_at', 'products.updated_at', 'categories.name as namakategori')->get();
        return $products;
    }

    public static function searchListProducts($id,$keyword)
    {
        $products = self::join('categories', 'products.category_id', 'categories.id')
            ->where('categories.id', $id)
            ->where('products.name', 'like', '%'+$keyword+"%")
            ->select('products.id', 'products.name', 'products.brand','products.harga','products.image_url','products.description', 'products.created_at', 'products.updated_at', 'categories.name as namakategori')->get();
        return $products;
    }

    public static function listProdFromType($id)
    {
        $products = self::join('types', 'products.type_id', 'types.id')
            ->where('types.id', $id)
            ->select('products.id', 'products.name', 'products.brand','products.harga','products.image_url','products.description', 'products.created_at', 'products.updated_at', 'types.name as namatype')->get();
        return $products;
    }
}
