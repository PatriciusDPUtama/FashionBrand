<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class,'transactions','order_id','product_id')->withPivot('quantity','total');
    }
}
