@extends('layout_template.eshophome')
@section('content')
    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <img src="{{asset('images/'.$data->image_url)}}" alt="Product Image">
                                </div>
                                {{-- <div class="product-slider-single-nav normal-slider">
                                <div class="slider-nav-img"><img src="{{$data->image_url}}" alt="Product Image"></div>
                                <div class="slider-nav-img"><img src="{{asset('template/img/product-3.jpg')}}" alt="Product Image"></div>
                                <div class="slider-nav-img"><img src="{{asset('template/img/product-5.jpg')}}" alt="Product Image"></div>
                                <div class="slider-nav-img"><img src="{{asset('template/img/product-7.jpg')}}" alt="Product Image"></div>
                                <div class="slider-nav-img"><img src="{{asset('template/img/product-9.jpg')}}" alt="Product Image"></div>
                                <div class="slider-nav-img"><img src="{{asset('template/img/product-10.jpg')}}" alt="Product Image"></div>
                            </div> --}}
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title">
                                        <h2>{{ $data->name }}</h2>
                                    </div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p>{{ number_format($data->harga, 2, ',', '.') }}</p>
                                    </div>
                
                                    <div class="p-size">
                                        <h4>{{$data->dimensi}}</h4>

                                    </div>
                                    <div class="action">
                                        <a class="btn" href="{{route('addToCart',$data->id)}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Product description</h4>
                                    <p>{{ $data->description }}</p>
                                </div>
                                <div id="specification" class="container tab-pane fade">
                                    <h4>Product specification</h4>
                                    <ul>
                                        <li>{{$data->dimensi}}</li>
                                        <li>Stok: {{$data->stok}}</li>
                                    </ul>
                                </div>
                                <div id="reviews" class="container tab-pane fade">
                                    <div class="reviews-submitted">
                                        <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam.
                                        </p>
                                    </div>
                                    <div class="reviews-submit">
                                        <h4>Give your Review:</h4>
                                        <div class="ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="section-header">
                            <h1>Related Products</h1>
                        </div>

                        <div class="row align-items-center product-slider product-slider-3">
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
                                            <img style="width: 324px; height:486px;"src="" id="prod-1"
                                                alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3 style="font-size: 15px">Rp</h3>
                                        <h3 style="font-size: 20px" id="prod-1-price"></h3>

                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
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
                                            <img style="width: 324px; height:486px;"src="" id="prod-2"
                                                alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3 style="font-size: 15px">Rp</h3>
                                        <h3 style="font-size: 20px" id="prod-2-price"></h3>

                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
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
                                            <img style="width: 324px; height:486px;" src="" id="prod-3"
                                                alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3 style="font-size: 15px">Rp</h3>
                                        <h3 style="font-size: 20px" id="prod-3-price"></h3>

                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
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
                                            <img style="width: 324px; height:486px;" src="" id="prod-4"
                                                alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3 style="font-size: 15px">Rp</h3>
                                        <h3 style="font-size: 20px" id="prod-4-price"></h3>

                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
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
                                            <img style="width: 324px; height:486px;" src="" id="prod-5"
                                                alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3 style="font-size: 15px">Rp</h3>
                                        <h3 style="font-size: 20px" id="prod-5-price"></h3>

                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                @foreach ($categories as $c)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('product-page-list', $c->id) }}"><i
                                                class="fa fa-chevron-right"></i>{{ $c->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
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
                                        <img style="width: 324px; height:486px;" src="" id="prod-6"
                                            alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3 style="font-size: 15px">Rp</h3>
                                    <h3 style="font-size: 20px" id="prod-6-price"></h3>

                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
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
                                        <img style="width: 324px; height:486px;" src="" id="prod-7"
                                            alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3 style="font-size: 15px">Rp</h3>
                                    <h3 style="font-size: 20px" id="prod-7-price"></h3>

                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
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
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3 style="font-size: 15px">Rp</h3>
                                    <h3 style="font-size: 20px" id="prod-8-price"></h3>
                                    
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">Our Brands</h2>
                        <ul>
                            @foreach ($types as $t)
                            <li>
                                <a href="{{ route('product-page-list-type', $t->id) }}"><i
                                        class="fa fa-chevron-right"></i>{{ $t->name }}</a><span>(45)</span>
                            </li>
                        @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-widget tag">
                        <h2 class="title">Tags Cloud</h2>
                        <a href="#">Lorem ipsum</a>
                        <a href="#">Vivamus</a>
                        <a href="#">Phasellus</a>
                        <a href="#">pulvinar</a>
                        <a href="#">Curabitur</a>
                        <a href="#">Fusce</a>
                        <a href="#">Sem quis</a>
                        <a href="#">Mollis metus</a>
                        <a href="#">Sit amet</a>
                        <a href="#">Vel posuere</a>
                        <a href="#">orci luctus</a>
                        <a href="#">Nam lorem</a>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

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

    <script>
        var prod = [
            @foreach ($products as $product)
                {
                    id: {{ $product->id }},
                    url: "{{ asset('images/'.$product->image_url) }}",
                    name: '{{ $product->name }}',
                    price: '{{ number_format($product->harga, 2, ',', '.') }}'
                },
            @endforeach
        ];

        var shuffleProd = shuffle(prod);

        var selectProd = shuffleProd.slice(0, 8);

        selectProd.forEach(function(image, index) {
            var imageIndex = index + 1;
            document.getElementById('prod-' + imageIndex).src = image.url;
            document.getElementById('prod-' + imageIndex + '-name').textContent = image.name;
            document.getElementById('prod-' + imageIndex + '-name').href =
                "{{ route('product-page-detail', '') }}" + "/" + image.id;
            document.getElementById('prod-' + imageIndex + '-price').textContent = image.price;
            document.getElementById('prod-' + imageIndex + '-link').href =
                "{{ route('product-page-detail', '') }}" + "/" + image.id;
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
