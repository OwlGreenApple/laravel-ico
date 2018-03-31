@extends('layouts.app')

@section('content')
	<link href="{{ asset('css/premium.css') }}" rel="stylesheet">
	
	<div class="container main-banner">
		<div class="row">
			<div class="col-xs-12 col-md-9 col-xs-offset-0 col-md-offset-1">
				<h1 align="center">Become Premium User Now <i class="premium-icon"></i></h1>
				<p align="center">Investors are browsing through 2000+ ICOs right now. <br> Their budget is limited and so is your time. <br>It is your obligation to make sure they notice your ICO first.</p>
			</div>  
		</div>  
	</div>
	
	<div class="container main-word">
		<div class="row">
			<div class="col-xs-12 col-md-9 col-xs-offset-0 col-md-offset-1">
				<h2>Engagement is the most effective marketing tools</h2>
				<p>Your ICO will be exclusively announced to ICOCheckr’s potential investors. </p>
				
				<h2>Competitor is a threat NO MORE</h2>
				<p>Higher chance for your ICO to be seen on competitors’ ICO profile, <br>while no competitor will be shown on yours.</p>
				
				<h2>Verification boosts your confidence</h2>
				<p>Your project will be marked as a premium ICO to ensuring your project <br>as a trusted ICO.</p>
				
				<h2>On the top of the list</h2>
				<p>Your ICO will be pinned on the ICOCheckr’s home page as well <br>as on our main list for the whole period, so your ICO will always be first to be seen.</p>
				
				<span class="word-for-free">Register your ICO for Free <br> or</span>
				<span class="word-for-premium">Get more Benefit with <br>
				Our ICO Registration Premium Services Now</span>
			</div>  
		</div>  
	</div>

	<div class="container choose-package">
		<div class="row">
			<div class="col-xs-12 col-md-3 wrap-choose-package">
				<input type="button" value="Basic" class="form-control btn header-package btn-basic">
				
				<div class="content-package">
					<p class="price">3 ETH</p>
					<hr>
				
					<p>3 days Featured Listing</p>
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
				<input type="button" value="Boost" class="form-control btn header-package btn-boost">
				
				<div class="content-package content-boost">
					<p class="price">9 ETH</p>
					<hr>
				
					<p>10 days Featured Listing</p>
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
					<hr>
				
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
					<hr>
				
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
					var h = $(this).height(); 
					max = h > max ? h : max;
			});
			$(".content-package").each(function() {
					$(this).height(max); 
			});
			$(".content-boost").height(max+60);
		}
    $(document).ready(function(){
      document.title = 'Premium ICOCheckr Packages';

			make_height_same();
			$('#button-process').click(function(e){
			});
			
			
    });
  </script>		
	
@endsection
