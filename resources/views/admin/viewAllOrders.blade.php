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
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                      <h4>Advanced Table</h4>
                      <div class="card-header-form">
                        <form action = "{{route('orderSearch')}}" method = "GET">
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
                            <th>User Name</th>
                            <th>User Phone</th>
                            <th>User Email</th>
                            <th>User Address</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Order Status</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                          @foreach ($orders  as $order)

                          <tr>
                              <td>{{$i}}</td>
                              <td>{{$order->user_name}}</td>
                              <td>{{$order->phone}}</td>
                              <td>{{$order->email}} </td>
                              <td>{{$order->address}} </td>
                              <td>{{$order->product_name}}</td>
                              <td>{{$order->product_price}}</td>
                              <td>{{$order->quantity}}</td>
                              <td>
                                @if ($order->order_status == "Accepted")

                                <div class="badge badge-primary">{{$order->order_status}}</div>
                                @else
                                <div class="badge badge-danger">{{$order->order_status}}</div>
                                @endif
                              </td>
                              <td>
                                  <img alt="image" src="storage/product-img/{{$order->img}}"  width="85"
                                  data-toggle="tooltip" title="Wildan Ahdian">
                                </td>
                                <td>
                              @if ($order->order_status == "Accepted")

                              <div class="btn btn-primary">{{'Delivered'}}</div>
                              @else

                              <a href="{{route('updateStatus',$order->id)}}" class="btn btn-primary"></i>Accept<i class="bi bi-check-square-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                            </svg></a></td>
                            @endif
                            {{-- <td><form action="{{ route('productDelete', $product->id) }}" method="post">
                                @csrf
                                <button class="btn bg-danger" type="submit">
                                  DELETE
                                </button>
                              </form></td> --}}
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
                {{$orders->links()}}
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
