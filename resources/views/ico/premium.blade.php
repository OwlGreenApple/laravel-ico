@extends('layouts.app')

@section('content')
	<link href="{{ asset('css/premium.css') }}" rel="stylesheet">
	
	<div class="container main-banner">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h1 align="center">Become Premium User Now <i class="premium-icon"></i></h1>
				<p align="center">Register your ICO for free or </p>
				<p align="center">Get more Benefit with <br>
				Our ICO Registration <b>Premium Services</b> NOW 
				</p>
			</div>  
		</div>  
	</div>
	
	<div class="container choose-package">
		<div class="row">
			<div class="col-xs-12 col-md-3 wrap-choose-package">
				<input type="button" value="Basic" class="form-control btn header-package btn-basic">
				
				<div class="content-package">
					<p class="price">3 ETH</p>
				
					<p>7 days Featured Listing</p>
					<p>1 Broadcast by Email</p> 
					<p>1 Broadcast on web notification</p>
					<p>1 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will be shown on your ICO profile</p>
					<!--<p>Your ICO will not be shown on competitor’s profile </p>-->
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order">
			</div>  
			
			<div class="col-xs-12 col-md-3 wrap-choose-package wrap-choose-package-boost">
				
				<div class="content-package content-boost">
					<div class="btn header-package btn-boost">
						Boost 
						<p class="price"> 9 ETH </p>
					</div>
					<p>15 days Featured Listing</p>
					<p>3 Broadcast by Email </p>
					<p>3 Broadcast on web notification</p>
					<p>3 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will not be shown on your ICO profile</p>
					<p>Your ICO will be shown on competitor’s profile </p>
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order btn-order-boost">
			</div>  
			
			<div class="col-xs-12 col-md-3 wrap-choose-package">
				<input type="button" value="Premium" class="form-control btn header-package btn-premium">
				
				<div class="content-package">
					<p class="price">20 ETH</p>
				
					<p>45 days Featured Listing</p>
					<p>6 Broadcast by Email </p>
					<p>6 Broadcast on web notification</p>
					<p>6 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will not be shown on your ICO profile</p>
					<p>Your ICO will be shown on competitor’s profile</p>
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order">
			</div>  
			
			<div class="col-xs-12 col-md-3 wrap-choose-package">
				<input type="button" value="Platinum" class="form-control btn header-package btn-platinum">
				
				<div class="content-package">
					<p class="price">30 ETH</p>
				
					<p>60 days Featured Listing</p>
					<p>10 Broadcast by Email </p>
					<p>10 Broadcast on web notification</p>
					<p>10 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will not be shown on your ICO profile</p>
					<p>Your ICO will be shown on competitor’s profile</p>
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order">
			</div>  
			
			
		</div>  
	</div>
	
  <script>
		function make_height_same(){
			var max = -1;
			$(".content-package").each(function() {
				var h = $(this).height()+40; // ditambah 40 karena ada padding 20 (top,bottom)
				max = h > max ? h : max;
			});
			$(".content-package").each(function() {
					$(this).height(max); 
			});
			$(".content-boost").height(max-80);
		}
    $(document).ready(function(){
      document.title = 'Premium ICOCheckr Packages';
			make_height_same();
    });
  </script>		
	
@endsection
