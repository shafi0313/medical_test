<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title') | {{config('app.name')}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta content='{{csrf_token()}}' name='csrf-token' />
	<link rel="icon" href="{{ asset('backend/assets/img/icon.ico') }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
	<script src="{{ asset('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset("backend/assets/css/fonts.css") }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/css/azzara.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >


	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}">

    {{-- For Date Picker --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/datepicker/css/bootstrap-datepicker3.standalone.min.css') }}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">

                <a href="{{ route('admin.dashboard') }}" class="logo"> <h2 class="display:4 text-light mt-3">Medical Test</h2>
					{{-- <img src="{{ asset('backend/assets/img/logoazzara.svg') }}" alt="navbar brand" class="navbar-brand"> --}}
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			{{-- Header --}}
			    @include('admin.layout.header')
			{{-- End Header --}}
		</div>

		{{-- Navigation --}}
        @include('admin.layout.navigation')
        {{-- End Navigation --}}

        @yield('content')

		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Topbar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeMainHeaderColor" data-color="blue"></button>
							<button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
							<button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeMainHeaderColor" data-color="green"></button>
							<button type="button" class="changeMainHeaderColor" data-color="orange"></button>
							<button type="button" class="changeMainHeaderColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div> --}}
		</div>
		<!-- End Custom template -->
	</div>
</div>

@include('admin.layout.footer')


@include('sweetalert::alert')
@stack('custom_scripts')


</body>
</html>

