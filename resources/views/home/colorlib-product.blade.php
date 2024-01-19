<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                <h2>Best Sellers</h2>
            </div>
        </div>
        <div class="row row-pb-md">
            @foreach ($products as $product )
            <div class="col-lg-3 mb-4 text-center">

                <div class="product-entry border">
                    <a href="{{ route('descProduct',$product->id) }}" class="prod-img">
                        <img src="storage/product-img/{{$product->img  }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                    </a>

                    <div class="desc">
                        <h2><a href="#">{{ $product->name }}</a></h2>
                        @if ($product->discount_price==NULL)
                        <span  class="price">${{ $product->price }}</span>
                        @else
                        <del>  <span  class="price">${{ $product->price }}</span></del>
                        <span class="price">${{ $product->discount_price }}</span>
                        @endif
                    </div>
                    <a href="{{route('addToSave',$product->id)}}" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
                </div>

            </div>
            @endforeach
            {{$products->links()}}
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="#" class="btn btn-primary btn-lg">Shop All Products</a></p>
            </div>
        </div>
    </div>
</div>
