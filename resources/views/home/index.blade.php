@if (Session::has('message'))

<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session()->get('message')}}</strong>
</div>
@endif
<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
            @include('home.css')
	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		@include('home.header')

        @include('home.slider')

        @include('home.colorlib-intro')

        @include('home.product')

        @include('home.colorlib-product')

        @include('home.colorlib-partner')

        @include('home.footer')
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

    @include('home.js')

	</body>
</html>

