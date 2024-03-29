<!DOCTYPE HTML>
<html>
	<head>
        <base href="/public">
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="home/cart.css">
	@include('home.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		@include('home.header')

        <section class="h-100 h-custom" style="background-color: #d2c9ff;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                  <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                      <div class="row g-0">
                        <div class="col-lg-8">
                          <div class="p-5">
                              @php
                                  $i = 0;
                                  $total_price = 0;
                              @endphp
                             @if (Session::has('message'))

                             <div class="alert alert-success alert-dismissible">
                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 <strong>{{session()->get('message')}}</strong>
                             </div>
                             @endif
                            <hr class="my-4">
                            @foreach ($carts as $cart)

                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                              <div class="col-md-2 col-lg-2 col-xl-2">
                                <img
                                  src="storage/product-img/{{$cart->img}}"
                                  class="img-fluid rounded-3" alt="Cotton T-shirt">
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="text-muted">{{$cart->product_name}}</h6>
                                <h6 class="text-black mb-0">Cotton T-shirt</h6>
                              </div>
                              {{-- <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                  <i class="fas fa-minus"></i>
                                </button>

                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                  class="form-control form-control-sm" />

                                <button class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div> --}}
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">$ {{$cart->total_price}}</h6>
                              </div>
                              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="{{route('deleteFromCart',$cart->id)}}" class="text-muted"><i class="fas fa-times"></i></a>
                              </div>
                            </div>
                            <hr class="my-4">

                            @php
                                $i++;
                                $total_price = $total_price+$cart->total_price;
                            @endphp
                            @endforeach
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h1 class="fw-bold mb-0 text-black">In The Cart</h1>
                                @if ($i == 1)
                                <h6 class="mb-0 text-muted">{{$i}} Product</h6>

                                @else
                                <h6 class="mb-0 text-muted">{{$i}} Products</h6>
                                @endif
                              </div>


                            <hr class="my-4">

                            <div class="pt-5">
                              <h6 class="mb-0"><a href="/" class="text-body"><i
                                    class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 bg-grey">
                          <div class="p-5">
                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                            {{-- <hr class="my-4"> --}}

                            {{-- <div class="d-flex justify-content-between mb-4">
                              <h5 class="text-uppercase">items 3</h5>
                              <h5>€ 132.00</h5>
                            </div>

                            <h5 class="text-uppercase mb-3">Shipping</h5>

                            <div class="mb-4 pb-2">
                              <select class="select">
                                <option value="1">Standard-Delivery- €5.00</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                              </select>
                            </div>

                            <h5 class="text-uppercase mb-3">Give code</h5>

                            <div class="mb-5">
                              <div class="form-outline">
                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplea2">Enter your code</label>
                              </div>
                            </div> --}}

                            <hr class="my-4">
                            <form action="{{route('addToOrder')}}" method="post">
                                @csrf
                            <div class="d-flex justify-content-between mb-5">
                              <h5 class="text-uppercase">Total price</h5>
                              <h5>$ {{$total_price}}</h5>
                            </div>

                            <button type="submit" style="color: white" class="btn bg-dark btn-block btn-lg"
                              >Order</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	@include('home.js')

	</body>
</html>
