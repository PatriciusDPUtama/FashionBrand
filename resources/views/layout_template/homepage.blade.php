@extends('layout_template.eshophome')
@section('content')
    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            @foreach ($types as $t)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('product-page-list-type',$t->id)}}"><i
                                            class="fa fa-chevron-right"></i>{{ $t->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        @foreach ($types as $t)
                            <div class="header-slider-item" style="width:500px; height:500px">
                                <img src="{{asset('images/'.$t->image_url)}}" alt="Slider Image"
                                    style="width: 100%; height:100%; object-fit: cover;" />
                                <div class="header-slider-caption">
                                    <p>{{ $t->name }}</p>
                                    <a class="btn" href="{{route('product-page-list-type',$t->id)}}"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img id="image-1" src="" />
                            <a id="image-1-link" class="img-text" href="">
                                <p id="image-1-content"></p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img id="image-2" src="" />
                            <a  id="image-2-link"class="img-text" href="">
                                <p id="image-2-content"></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="{{ asset('template/img/brand-1.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('template/img/brand-2.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('template/img/brand-3.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('template/img/brand-4.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('template/img/brand-5.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('template/img/brand-6.png') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>Secure Payment</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Worldwide Delivery</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>90 Days Return</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>24/7 Support</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->

    <!-- Category Start-->
    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img id="image-3"src="" />
                        <a  id="image-3-link"class="category-name" href="">
                            <p id="image-3-content"></p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-250">
                        <img id="image-4"src="" />
                        <a  id="image-4-link"class="category-name" href="">
                            <p id="image-4-content"></p>
                        </a>
                    </div>
                    <div class="category-item ch-150">
                        <img id="image-5"src="" />
                        <a  id="image-5-link"class="category-name" href="">
                            <p id="image-5-content"></p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-150">
                        <img src=""id="image-6" />
                        <a id="image-6-link" class="category-name" href="">
                            <p id="image-6-content"></p>
                        </a>
                    </div>
                    <div class="category-item ch-250">
                        <img src=""id="image-7" />
                        <a id="image-7-link" class="category-name" href="">
                            <p id="image-7-content"></p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src=""id="image-8" />
                        <a id="image-8-link" class="category-name" href="">
                            <p id="image-8-content"></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End-->


    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Product</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-1-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="" id="prod-1-link">
                                <img style="width: 324px; height:486px;"src="" id="prod-1" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-1-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-1-price"></h3>
                            
                            <a class="btn" href="" id="prod-1-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-2-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href=""id="prod-2-link">
                                <img style="width: 324px; height:486px;"src="" id="prod-2" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-2-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-2-price"></h3>
                            
                            <a class="btn" href="" id="prod-2-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-3-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href=""id="prod-3-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-3" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-3-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-3-price"></h3>
                            
                            <a class="btn" href="" id="prod-3-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-4-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="" id="prod-4-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-4" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-4-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-4-price"></h3>
                            
                            <a class="btn" href="" id="prod-4-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-5-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href=""id="prod-5-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-5" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-5-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-5-price"></h3>
                            
                            <a class="btn" href="" id="prod-5-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Product End -->

    <!-- Recent Product Start -->
    <div class="recent-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Recent Product</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-6-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="" id="prod-6-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-6" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-6-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-6-price"></h3>
                            
                            <a class="btn" href="" id="prod-6-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-7-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="" id="prod-7-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-7" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-7-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-7-price"></h3>
                            
                            <a class="btn" href="" id="prod-7-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-8-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="" id="prod-8-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-8" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-8-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-8-price"></h3>
                            
                            <a class="btn" href="" id="prod-8-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-9-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href=""id="prod-9-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-9" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-9-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-9-price"></h3>
                            
                            <a class="btn" href="" id="prod-9-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="" id="prod-10-name"></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="" id="prod-10-link">
                                <img style="width: 324px; height:486px;" src="" id="prod-10" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href=""id="prod-10-cart"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3 style="font-size: 15px">Rp</h3>
                            <h3 style="font-size: 20px" id="prod-10-price"></h3>
                            <a class="btn" href="" id="prod-10-shop"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Product End -->

    <script>
        var images = [
            @foreach ($categories as $category)
                {
                    id: {{ $category->id }},
                    url: '{{ asset('images/'.$category->image_url) }}',
                    name: '{{ $category->name }}'
                },
            @endforeach
        ];

        var shuffledImages = shuffle(images);

        var selectedImages = shuffledImages.slice(0, 8);

        selectedImages.forEach(function(image, index) {
            var imageIndex = index + 1;
            document.getElementById('image-' + imageIndex).src = image.url;
            document.getElementById('image-' + imageIndex + '-content').textContent = image.name;
            document.getElementById('image-' + imageIndex + '-link').href = "{{ route('product-page-list', '') }}" + "/" + image.id;
            console.log('Random Image ' + imageIndex + ' ID: ' + image.id);
        });

        function shuffle(array) {
            var currentIndex = array.length;
            var temporaryValue, randomIndex;

            while (currentIndex !== 0) {
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }

            return array;

        }

        var prod = [
            @foreach ($products as $product)
                {
                    id: {{ $product->id }},
                    url: '{{ asset('images/'.$product->image_url) }}',
                    name: '{{ $product->name }}',
                    price: '{{ number_format($product->harga, 2, ',', '.') }}'
                },
            @endforeach
        ];

        var shuffleProd = shuffle(prod);

        var selectProd = shuffleProd.slice(0, 10);

        selectProd.forEach(function(image, index) {
            var imageIndex = index + 1;
            document.getElementById('prod-' + imageIndex).src = image.url;
            document.getElementById('prod-' + imageIndex + '-name').textContent = image.name;
            document.getElementById('prod-' + imageIndex + '-name').href = "{{ route('product-page-detail', '') }}" + "/" + image.id;
            document.getElementById('prod-' + imageIndex + '-price').textContent = image.price;
            document.getElementById('prod-' + imageIndex + '-link').href = "{{ route('product-page-detail', '') }}" + "/" + image.id;
            document.getElementById('prod-' + imageIndex + '-cart').href = "{{ route('addToCart', '') }}" + "/" + image.id;
            document.getElementById('prod-' + imageIndex + '-shop').href = "{{ route('addToCart', '') }}" + "/" + image.id;
            console.log('Random Image ' + imageIndex + ' ID: ' + image.id);
        });

        function shuffle(array) {
            var currentIndex = array.length;
            var temporaryValue, randomIndex;

            while (currentIndex !== 0) {
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }

            return array;

        }
    </script>
@endsection
