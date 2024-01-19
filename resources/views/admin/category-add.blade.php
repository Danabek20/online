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
            <form action="{{route('categoryStore')}}" method="post">
                @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control">
            </div>

        </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
        </form>
        </div>

      </div>

        <div class="col-12 col-md-6 col-lg-10">
          <div class="card">
            <div class="card-header">
              <h4>All Categories</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  @php
                      $i = 1;
                  @endphp
                  @foreach ($categories as $category)

                  <tr>
                      <td>{{$i}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->created_at}}</td>
                      <td>
                          <div class="badge badge-success">Active</div>
                        </td>
                        <td><a href="{{route('categoryEdit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                        <td><form action="{{ route('categoryDelete', $category->id) }}" method="post">
                            @csrf
                            {{-- @method('DELETE') --}}
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
                {{$categories->links()}}
              </div>
            </div>

          </div>
        </div>


    </div>

</div>
</div>
</section>
</div>
  <!-- General JS Scripts -->

  @include('admin.js')
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>
