<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ICOCheckr') }}</title>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo-square.png') }}">

    <!-- Styles -->
    <!-- 
		-->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
		
    <!-- Scripts -->
    <!-- 
		-->
		<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(window).on('load', function() { 
          $("#div-loading").hide();
        });   
        $(document).ready(function() {
          $(".main-content").css("min-height",$(window).height()-121);
          $( window ).resize(function() {
            $(".main-content").css("min-height",$(window).height()-121);
          });
				});
		</script>
</head>
<body>
    <div id="div-loading">
      <div class="loadmain"></div>
      <div class="background-load"></div>
    </div>

		<nav class="navbar navbar-default navbar-static-top">
				<div class="container">
            <div class="navbar-header">

                <!-- Collapsed Menu -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-icocheckr.png') }}" alt="ICOCheckr">
                </a>
            </div>


						<div class="collapse navbar-collapse" id="app-navbar-collapse" style="height:1px;">
								<!-- Left Side Of Navbar -->
								<ul class="nav navbar-nav">
										&nbsp;
								</ul>

								<!-- Right Side Of Navbar -->
								<ul class="nav navbar-nav navbar-right">
											<li ><a href="https://icocheckr.com">ICOCheckr</a></li>
											<li @if(Request::is('coupon')) class="active" @endif><a href="{{ url('coupon') }}">ICO's</a></li>
											<li @if(Request::is('coupon')) class="active" @endif><a href="{{ url('coupon') }}">Rating Guide</a></li>
											<li @if(Request::is('coupon')) class="active" @endif><a href="{{ url('coupon') }}">FAQ</a></li>
											<li @if(Request::is('coupon')) class="active" @endif><a href="{{ url('coupon') }}">Publish ICO</a></li>
										
											@guest
											@else
											<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
															{{ Auth::user()->fullname }} <span class="caret"></span>
													</a>

													<ul class="dropdown-menu">
														
															<li>
																	<a href="{{ route('logout') }}"
																			onclick="event.preventDefault();
																							 document.getElementById('logout-form').submit();">
																			Logout
																	</a>

																	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																			{{ csrf_field() }}
																	</form>
															</li>
													</ul>
											</li>
											@endguest
								</ul>
						</div>
				</div>
		</nav>

		<div @if ( (Auth::guest()) && (!Request::is('test')) ) style="no-repeat center center fixed;  -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover,100%;" @endif class="main-content" >
			@yield('content')
		</div>
				
				
    <div class="div-footer">
      <p>© 2018 ICOCheckr.com All rights reserved</p>
    </div>
    

</body>
</html>
