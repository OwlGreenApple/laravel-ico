<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="description" content="Ico, blockchain,  cryptocurrency,  coin offering,  ico coin,  ico token,  token,  new ico, best ico,  ico check,  icocheckr,  ico ranking,  ico ranks,  top ico,  icobench">
		<meta name="keywords" content="Ico, blockchain,  cryptocurrency,  coin offering,  ico coin,  ico token,  token,  new ico, best ico,  ico check,  icocheckr,  ico ranking,  ico ranks,  top ico,  icobench">
		
		
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
		<link href="{{ asset('slick/slick.css') }}" rel="stylesheet">
		<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">
		
    <!-- Scripts -->
    <!-- 
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		-->
		<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('selectize/selectize.js') }}"></script>
		<script src="{{ asset('slick/slick.min.js') }}"></script>
    <script type="text/javascript">
        $(window).on('load', function() { 
          $("#div-loading").hide();
        });   
        $(document).ready(function() {
          $(".main-content").css("min-height",$(window).height()-121);
          $( window ).resize(function() {
            $(".main-content").css("min-height",$(window).height()-121);
          });
					$('.btn-subscribe').click(function(e){
							$.ajax({
								url: '<?php echo url('subscribe'); ?>',
								headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								},
								type: 'post',
								data: {
									email: $("#email-subscribe").val(),
									name: $("#name-subscribe").val(),
								},
								beforeSend: function()
								{
									$("#div-loading").show();
								},
								dataType: 'text',
								success: function(result)
								{
									var data = jQuery.parseJSON(result);
									$("#alert-subscribe").show();
									$("#alert-subscribe").html(data.message);
									if(data.type=='success') {
										$("#alert-subscribe").addClass("alert-success");
										$("#alert-subscribe").removeClass("alert-danger");
									} else if (data.type=='error') {
										$("#alert-subscribe").addClass("alert-danger");
										$("#alert-subscribe").removeClass("alert-success");
									}
									$("#div-loading").hide();
								}
							});
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
											<li><a href="https://icocheckr.com/news/first-step/">Start Here</a></li>
											<li @if(Request::is('ico')) class="active" @endif><a href="{{ url('/ico') }}">Search</a></li>
											<li @if(Request::is('premium')) class="active" @endif><a href="{{ url('/premium') }}">Publish ICO</a></li>
										
											@guest
											<li @if(Request::is('/test2')) class="active" @endif><a href="{{ url('/login') }}">Login</a></li>
											@else
											<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
															{{ Auth::user()->fullname }} <span class="caret"></span>
													</a>

													<ul class="dropdown-menu">
														<?php if (Auth::user()->is_admin) { ?>
															<li @if(Request::is('ico-admin')) class="active" @endif><a href="{{ url('ico-admin') }}">ICO (Admin)</a></li>
															<li @if(Request::is('confirm-payment-admin')) class="active" @endif><a href="{{ url('confirm-payment-admin') }}">Order (Admin)</a></li>
															<li @if(Request::is('publish-admin')) class="active" @endif><a href="{{ url('publish-admin') }}">Publish (Admin)</a></li>
														<?php } ?>
															<li @if(Request::is('confirm-payment')) class="active" @endif><a href="{{ url('confirm-payment') }}">Confirm Payment	</a></li>
															<li>
																	<a href="{{ url('logout') }}">
																			Logout
																	</a>

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
							support@icocheckr.com
						</p>
						<br>
						<label>
							Follow US
						</label>
						<div class="row">
							<a href="https://www.facebook.com/icocheckr/" target="_blank"><i class="icon icon-fb"></i></a>
							<a href="https://instagram.com/icocheckr" target="_blank"><i class="icon icon-ig"></i></a>
							<a href="https://twitter.com/icocheckr" target="_blank"><i class="icon icon-twitter"></i></a>
							<a href="https://t.me/icocheckr" target="_blank"><i class="icon icon-telegram"></i></a>
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
						<div class="alert alert-danger" id="alert-subscribe" style="display:none;">
						</div>  
						<input type="text" class="form-control" id="name-subscribe" placeholder="Fullname">
						<input type="text" class="form-control" id="email-subscribe" placeholder="Email" style="margin-top:5px;">
						<input type="button" class="btn btn-subscribe" value="Subscribe">
					</div>
				</div>
				
				<p>© 2018 ICOCheckr.com All rights reserved</p>
			</div>
    </div>
    

<script id="ulp-remote" src="https://icocheckr.com/popup/content/plugins/layered-popups/js/remote.min.js?ver=6.32" data-handler="https://icocheckr.com/popup/ajax.php"></script>
<script >
	ulp_add_event("onload", {
		popup:		"ab-EgiCPKDGsheaMyBq",
		popup_mobile:	"ab-EgiCPKDGsheaMyBq",
		mode:		"every-time",
		period:		5,
		delay:		0,
		close_delay:	0
	});
</script>

</body>
</html>
