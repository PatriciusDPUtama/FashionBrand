<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name'=>'Men Clothing',
            'image_url'=>'https://manofmany.com/wp-content/uploads/2021/07/Best-Australian-Stores-Australia.jpg'
        ]);

        DB::table('categories')->insert([
            'name'=>'Women Clothing',
            'image_url'=>'https://www.evernew.ca/media/wysiwyg/CAINT-TrioTiles-890x1100-DT-02.jpg'
        ]);

        DB::table('categories')->insert([
            'name'=>'Kids Clothing',
            'image_url'=>'https://m.media-amazon.com/images/I/71be9OHBMwL._AC_SX679_.jpg'
        ]);

        DB::table('categories')->insert([
            'name'=>'Babies Clothing',
            'image_url'=>'https://threadcurve.com/wp-content/uploads/2020/07/online-baby-clothing-stores-July152020-1-min.jpg.webp'
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Handbags & Purses',
            'image_url'=>'https://cdn.cliqueinc.com/posts/291169/most-popular-designer-handbags-291169-1668790724441-main.1200x0c.jpg?interlace=true&quality=70'
        ]);

        DB::table('categories')->insert([
            'name'=>'Accessories',
            'image_url'=>'https://i0.wp.com/blog.shoplc.com/wp-content/uploads/2021/01/hair-accessories-featured-image-3693209_1.jpg?fit=1500%2C1500&ssl=1'
        ]);

        DB::table('categories')->insert([
            'name'=>'Jewellery',
            'image_url'=>'https://static.thehoneycombers.com/wp-content/uploads/sites/2/2022/03/minimalist-jewellery-singapore-900x643.png'
        ]);

        DB::table('categories')->insert([
            'name'=>'Cosmetics',
            'image_url'=>'https://cdn.britannica.com/35/222035-131-9FC95B31/makeup-cosmetics.jpg'
        ]);
    }
}
