<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <base href="/public">
    <link rel="stylesheet" href="">
    @include('admin.css')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        @include('admin.navbar')
      <div class="main-sidebar sidebar-s
      tyle-2">
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
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Category Add</h4>
          </div>
          <div class="card-body">
            <form action="{{route('categoryUpdate')}}" method="post">
                @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="hidden" value="{{$category->id}}" name="id">
              <input type="text" name="name" value="{{$category->name}}" class="form-control">
            </div>

        </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
        </form>
        </div>

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
