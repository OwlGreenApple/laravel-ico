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
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">
		<link href="{{ asset('selectize/selectize.css') }}" rel="stylesheet">
		
    <!-- Scripts -->
    <!-- 
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		-->
		<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('selectize/selectize.js') }}"></script>
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
<!-- Enable bootstrap 4 theme -->
<script>window.__theme = 'bs4';</script>		
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
											<li><a href="https://icocheckr.com/2018/02/06/start-icocheckr/">First Step</a></li>
											<li><a href="https://icocheckr.com/ico-blog/">ICO Picks</a></li>
											<li @if(Request::is('/')) class="active" @endif><a href="{{ url('/') }}">ICO Details</a></li>
											<li @if(Request::is('coupon')) class="active" @endif><a href="{{ url('coupon') }}">Search</a></li>
										
											@guest
											@else
											<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
															{{ Auth::user()->fullname }} <span class="caret"></span>
													</a>

													<ul class="dropdown-menu">
														<?php if (Auth::user()->is_admin) { ?>
															<li @if(Request::is('ico-admin')) class="active" @endif><a href="{{ url('ico-admin') }}">ICO	</a></li>
															<li @if(Request::is('rating-admin')) class="active" @endif><a href="{{ url('rating-admin') }}">Rating	</a></li>
														<?php } ?>
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
			<div class="container theme-showcase" role="main">
				@yield('content')
			</div>
		</div>


    <div class="div-footer">
			<div class="container">
				<div class="row">
					<img src="{{ asset('images/logo-icocheckr-white.png') }}" alt="ICOCheckr">
				</div>
				<div class="row" style="margin-top:40px;">
					<div class="col-xs-12 col-md-6">
						<label>
							Contact US
						</label>
						<p>
							emailus@icocheckr.com
						</p>
						<br>
						<br>
						<label>
							Follow US
						</label>
						<div class="row">
							<i class="icon icon-fb"></i>
							<i class="icon icon-ig"></i>
						</div>
						<br>
						<br>
					</div>
					<div class="col-xs-12 col-md-3">
						<label>
							Subscribe US
						</label>
						<p>
							Get the latest updates
						</p>
						<input type="text" class="form-control">
						<input type="button" class="btn btn-subscribe" value="Subscribe">
					</div>
				</div>
				
				<p>© 2018 ICOCheckr.com All rights reserved</p>
			</div>
    </div>
    

</body>
</html>
