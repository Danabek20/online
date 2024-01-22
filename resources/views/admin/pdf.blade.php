<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-header bg-black"></div>
        <div class="card-body">

          <div class="container">
            <div class="row">
              <div class="col-xl-12">
                <i class="far fa-building text-danger fa-6x float-start"></i>
              </div>
            </div>


            <div class="row">
              <div class="col-xl-12">


                  <ul class="list-unstyled float-end">
                    <li style="font-size: 30px; color: red;">Company</li>
                    <li>Street Sh.Abdirov</li>
                    <li>+998(90)708-36-36</li>
                    <li>karsu@mail.com</li>
                  </ul>
                </div>
            </div>

            <div class="row mx-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Customer Name:</th>
                            <th scope="col">{{$desc->user_name}}</th>
                        </tr>
                        <tr>
                            <th scope="col">Customer Phone:</th>
                            <th scope="col">+{{$desc->phone}}</th>
                        </tr>
                        <tr>
                            <th scope="col">Customer E-mail:</th>
                            <th scope="col">{{$desc->email}}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="row text-center">
              <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Invoice</h3>
              <p>{{$desc->id}}</p>
            </div>

            <div class="row mx-3">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$desc->product_name}}</td>
                    <td><i class="fas fa-dollar-sign"></i> {{$desc->quantity}} </td>
                    <td><i class="fas fa-dollar-sign"></i> {{$desc->product_price}} $</td>
                  </tr>
                </tbody>
              </table>

            </div>
            <div class="row">
              <div class="col-xl-8">
                <ul class="list-unstyled float-end me-0">
                  <li><span class="me-3 float-start">Total Price:</span><i class="fas fa-dollar-sign"></i> {{$desc->total_price}} $
                  </li>

                  {{-- <li> <span class="me-5">Discount price:</span><i class="fas fa-dollar-sign"></i> 500,00</li> --}}
                  {{-- <li><span class="float-start" style="margin-right: 35px;">Shippment: </span><i
                      class="fas fa-dollar-sign"></i> 500,00</li> --}}
                </ul>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xl-8" style="margin-left:60px">
                <p class="float-end"
                  style="font-size: 30px; color: red; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                  Total:
                  <span><i class="fas fa-dollar-sign"></i> {{$desc->total_price}} $</span></p>
              </div>

            </div>

            <div class="row mt-2 mb-5">
              <p class="fw-bold">Date: <span class="text-muted">{{$desc->created_at}}</span></p>
              <p class="fw-bold mt-3">Signature:</p>
            </div>

          </div>



        </div>
        <div class="card-footer bg-black"></div>
      </div>
</body>
</html>
