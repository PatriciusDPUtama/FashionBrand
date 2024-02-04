@extends('layout_template.eshophome')
@section('content')
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <input type="email" value="Search">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Newest</a>
                                                    <a href="#" class="dropdown-item">Oldest</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-price-range">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Product price range
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">$0 to $50</a>
                                                    <a href="#" class="dropdown-item">$51 to $100</a>
                                                    <a href="#" class="dropdown-item">$101 to $150</a>
                                                    <a href="#" class="dropdown-item">$151 to $200</a>
                                                    <a href="#" class="dropdown-item">$201 to $250</a>
                                                    <a href="#" class="dropdown-item">$251 to $300</a>
                                                    <a href="#" class="dropdown-item">$301 to $350</a>
                                                    <a href="#" class="dropdown-item">$351 to $400</a>
                                                    <a href="#" class="dropdown-item">$401 to $450</a>
                                                    <a href="#" class="dropdown-item">$451 to $500</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($data as $p)
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="{{ route('product-page-detail', $p->id) }}">{{ $p->name}}</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="{{asset('images/'.$p->image_url)}}" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="{{route('addToCart',$p->id)}}"><i class="fa fa-cart-plus"></i></a>
                                            <a href="{{ route('product-page-detail', $p->id) }}"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3 style="font-size:15px;">Rp</h3>
                                        <h3 style="font-size:20px">{{ number_format($p->harga, 2, ',', '.') }}</h3>
                                        <a class="btn" href="{{route('addToCart',$p->id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination Start -->
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination Start -->
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
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">Types</h2>
                        <ul>
                            @foreach ($types as $t)
                                <li>
                                    <a href="{{ route('product-page-list-type', $t->id) }}"><i
                                            ></i>{{ $t->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <!-- <div class="sidebar-widget tag">
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
                    </div> -->

                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product List End -->

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
@endsection

@section('javascript')
    <script>
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

        var selectProd = shuffleProd.slice(0, 3);

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
