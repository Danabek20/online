<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  @include('admin.css')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        @include('admin.navbar')
      <div class="main-sidebar sidebar-style-2">
       @include('admin.sidebar')
      </div>
      <!-- Main Content -->
<div class="main-content">
    @if (Session::has('message'))

    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{-- <button type="button" class="btn-close" data-dismiss="alert" aria-label="close">&times;</button> --}}
        <strong>{{session()->get('message')}}</strong>
    </div>
    @endif
    <section class="section">
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h4>Advanced Table</h4>
                      <div class="card-header-form">
                        <form action = "{{route('productSearch')}}" method = "GET">
                          <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    @php
                        $i = 1;
                    @endphp
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                          @foreach ($products  as $product)

                          <tr>
                              <td>{{$i}}</td>
                              <td>{{$product->category}}</td>
                              <td>{{$product->name}}</td>
                            <td>
                                <img alt="image" src="storage/product-img/{{$product->img}}"  width="85"
                                data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>{{$product->price}} $</td>
                            <td>{{$product->discount_price}} $</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->desc}}</td>
                            <td>
                                <div class="badge badge-success">Completed</div>
                            </td>
                            <td><a href="{{route('productEdit', $product->id)}}" class="btn btn-primary">Edit</a></td>
                            <td><form action="{{ route('productDelete', $product->id) }}" method="post">
                                @csrf
                                <button class="btn bg-danger" type="submit">
                                  DELETE
                                </button>
                              </form></td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
                {{$products->links()}}
            </div>
        </div>

</div>
</div>
</section>
@include('admin.footer')
</div>
  <!-- General JS Scripts -->

  @include('admin.js')
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>
