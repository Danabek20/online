<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
            @include('home.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		@include('home.header')


        <div class="colorlib-product">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                        <h2>Best Sellers</h2>
                    </div>
                </div>
                <div class="row row-pb-md">
                    @foreach ($saved as $save )
                    <div class="col-lg-3 mb-4 text-center">

                        <div class="product-entry border">
                            <a href="{{ route('descProduct',$save->id) }}" class="prod-img">
                                <img src="storage/product-img/{{$save->img  }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                            </a>

                            <div class="desc">
                                <h2><a href="#">{{ $save->name }}</a></h2>
                                @if ($save->discount_price==NULL)
                                <span  class="price">${{ $save->price }}</span>
                                @else
                                <del>  <span  class="price">${{ $save->price }}</span></del>
                                <span class="price">${{ $save->discount_price }}</span>
                                @endif
                            </div>
                            {{-- <a href="{{ route('descProduct',$save->id) }}" class="btn btn-success shadow-0"> <i class="bi bi-trash-fill"></i>Delete</a> --}}
                            <a href="{{route('deleteFromSaved',$save->id)}}" class="btn btn-light border border-secondary py-2 icon-hover px-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                              </svg>  </a>
                        </div>

                    </div>
                    @endforeach
                    {{-- {{$products->links()}} --}}
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><a href="#" class="btn btn-primary btn-lg">Shop All Products</a></p>
                    </div>
                </div>
            </div>
        </div>

        @include('home.footer')
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

    @include('home.js')

	</body>
</html>

