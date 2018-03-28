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
				<h5>Targeted advertising</h5>
				<p>Premium listing will put your ICO<br> in front of your targeted audience</p>
				
				<h5>Targeted advertising</h5>
				<p>Your ICO will be on the top of the browse list <br>in assigned or selected categories</p>
				
				<h5>Targeted advertising</h5>
				<p>Your ICO will have increased visibility <br>on the competitors' ICO profiles and at the same time <br> all competitors will be removed from your ICO profile.</p>
				<span class="word-for-free">Register your ICO for Free <br> or</span>
				<span class="word-for-premium">Get more Benefit with <br>
				Our ICO Registration Premium Services Now</span>
			</div>  
		</div>  
	</div>

	
  <script>
    $(document).ready(function(){
      document.title = 'Premium ICOCheckr Packages';

			
			$('#button-process').click(function(e){
			});
			
			
    });
  </script>		
	
@endsection
