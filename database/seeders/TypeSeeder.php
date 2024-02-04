<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            'name'=>'T-shirts',
            'image_url'=>'https://cdn.shopify.com/s/files/1/0423/2540/9943/products/S18-BasicT-shirt-White-21118-Homebodii-0990_2048x2048.jpg?v=1625884789'
        ]);

        DB::table('types')->insert([
            'name'=>'Jackets',
            'image_url'=>'https://johnlewis.scene7.com/is/image/JohnLewis/005935971?$rsp-pdp-port-640$'
        ]);

        DB::table('types')->insert([
            'name'=>'Jeans',
            'image_url'=>'https://www.subdued.com/media/catalog/product/p/n/pn07el6col076-1_8.jpg?optimize=high&fit=bounds&height=1080&width=720&canvas=720:1080'
        ]);

        DB::table('types')->insert([
            'name'=>'Blouses',
            'image_url'=>'https://images.prismic.io/seidensticker-b2c/4a669e87-de94-41c0-9f7d-44042b313e0a_Content_1440x980_DOB_Blusen.jpg?auto=compress,format&rect=0,0,1440,979&w=1000&h=680'
        ]);

        DB::table('types')->insert([
            'name'=>'Bodysuits',
            'image_url'=>'https://www.evernew.ca/media/wysiwyg/CAINT-TrioTiles-890x1100-DT-02.jpg'
        ]);

        DB::table('types')->insert([
            'name'=>'Cardigans',
            'image_url'=>'https://images.asos-media.com/products/asos-design-crochet-cardigan-with-contrast-stripe-sleeve/203891690-1-multi?$n_750w$&wid=750&hei=750&fit=crop'
        ]);

        DB::table('types')->insert([
            'name'=>'Coats',
            'image_url'=>'https://www.charlestyrwhitt.com/dw/image/v2/AAWJ_PRD/on/demandware.static/-/Sites-ctshirts-master/default/dw87995f50/hi-res/OUR0027LST_MODEL_FRONT.jpg?sw=430&sh=540'
        ]);

        DB::table('types')->insert([
            'name'=>'Dresses',
            'image_url'=>'https://graceloveslace.eu/cdn/shop/products/grace-loves-lace.shop_.wedding-dresses-song-001_1024x1024.jpg?v=1651479906'
        ]);

        DB::table('types')->insert([
            'name'=>'Leggings',
            'image_url'=>'https://contents.mediadecathlon.com/p2027282/k$ba8cb3db766c54bbc6af5ae66aa46147/high-waisted-fitness-leggings.jpg?format=auto&quality=40&f=452x452'
        ]);

        DB::table('types')->insert([
            'name'=>'Trousers',
            'image_url'=>'https://assets.ajio.com/medias/sys_master/root/20230629/iJcd/649ceb97a9b42d15c91f860d/-473Wx593H-466065447-black-MODEL.jpg'
        ]);

        DB::table('types')->insert([
            'name'=>'Pajamas',
            'image_url'=>'https://cdn.shopify.com/s/files/1/2114/3697/products/BlushShort_1200x1200.jpg?v=1653674339'
        ]);

        DB::table('types')->insert([
            'name'=>'Skirts',
            'image_url'=>'https://m.media-amazon.com/images/I/614tCTX0LeL._AC_UX679_.jpg'
        ]);

        DB::table('types')->insert([
            'name'=>'Socks',
            'image_url'=>'https://images.everydayhealth.com/images/compression-socks-101-1440x810.jpg'
        ]);

        DB::table('types')->insert([
            'name'=>'Shoes',
            'image_url'=>'https://hips.hearstapps.com/hmg-prod/images/white-female-shoes-on-feet-royalty-free-image-912581410-1563805834.jpg?crop=0.66667xw:1xh;center,top&resize=980:*'
        ]);

        DB::table('types')->insert([
            'name'=>'Tops',
            'image_url'=>'https://m.media-amazon.com/images/I/61l9ah6a4iL._AC_UX679_.jpg'
        ]);

        DB::table('types')->insert([
            'name'=>'Shorts',
            'image_url'=>'https://hips.hearstapps.com/hmg-prod/images/how-to-make-cutoffs-1593456176.png?crop=0.502xw:1.00xh;0.260xw,0&resize=1200:*'
        ]);

        DB::table('types')->insert([
            'name'=>'Ties',
            'image_url'=>'https://cdn.shopify.com/s/files/1/0277/2195/7460/articles/unnamed_44a26a38-97ea-45f3-a594-42444ed2eeed_750x.jpg?v=1673452569'
        ]);

        DB::table('types')->insert([
            'name'=>'Sweater',
            'image_url'=>'https://publish.purewow.net/wp-content/uploads/sites/2/2022/10/fisherman-sweater-fall-winter-sweater-trends-2022.jpg?fit=680%2C800'
        ]);
    }
}
