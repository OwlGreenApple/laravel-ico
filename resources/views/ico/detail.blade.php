@extends('layouts.app')

@section('content')
	<link href="{{ asset('css/detail.css') }}" rel="stylesheet">
	
	<div class="container">
		<div class="row">
			<div class="banner-ico fl">
				<img src="{{asset('images/logo-ico').'/'.$ico->logo}}" class="ico-logo">
			</div>
			<div class="banner-name fl">
				<h1>{{$ico->name}}</h1>
				<h2>{{$ico->tagline}}</h2>
			</div>
			<div class="fn">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<!-- little menu -->
			<div class="col-xs-12 col-md-10 pull-right">
				<div class="navbar navbar-default navbar-static-top navbar-detail">
					<ul class="nav navbar-nav">
						<li><a href="#" id="nav-about">About</a></li>
						<li><a href="#" id="nav-trading">Trading</a></li>
						<li><a href="#" id="nav-financial">Financial</a></li>
						<li><a href="#" id="nav-detail">Details</a></li>
						<li><a href="#" id="nav-about">Bookmark</a></li>
					</ul>
				</div>
				<div class="main-content content-ico-about">
					<?php echo $ico->description; ?>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="{{$ico->url_link_video}}" allowfullscreen></iframe>
					</div>					
					<?php echo $ico->about; ?>
				</div>
				<div class="main-content content-ico-trading">
				</div>
				<div class="main-content content-ico-financial">
				</div>
				<div class="main-content content-ico-detail">
				</div>
			</div>


			<div class="col-xs-12 col-md-2 pull-right">
				<div class="div-rating row">
					<div class="row">
						<div class="col-xs-5 col-md-5">
							<span class="label-header-rating">Rating</span>
						</div>
						<div class="col-xs-5 col-md-5 col-lg-offset-2">	
							<span class="label-header-rating-value pull-right">AAA</span>
						</div>
					</div>
					<hr class="row">
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Profile</p>
							<p class="label-rating-value">7.0</p>
						</div>
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Social</p>
							<p class="label-rating-value">7.0</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Team</p>
							<p class="label-rating-value">7.0</p>
						</div>
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Hype</p>
							<p class="label-rating-value">7.0</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<input type="button" class="btn btn-buy" value="Buy ICO">
						</div>
					</div>
				</div>
				<div class="mini-icon row">
					<a class="icon icon-1" href="" target="_blank"></a>
					<a class="icon icon-2" href="" target="_blank"></a>
					<a class="icon icon-3" href="" target="_blank"></a>
					<a class="icon icon-4" href="" target="_blank"></a>
					<a class="icon icon-5" href="" target="_blank"></a>
					<a class="icon icon-6" href="" target="_blank"></a>
					<a class="icon icon-7" href="" target="_blank"></a>
					<a class="icon icon-8" href="" target="_blank"></a>
				</div>
			</div>
		</div>
	</div>

  <script>
    $(document).ready(function(){
      document.title = 'ICO rating and details';
			$(".content-ico-about").show();
			$(".content-ico-trading").hide();
			$(".content-ico-financial").hide();
			$(".content-ico-detail").hide();
			$('#nav-about').click(function(e){
				$(".content-ico-about").show();
				$(".content-ico-trading").hide();
				$(".content-ico-financial").hide();
				$(".content-ico-detail").hide();
			});
			$('#nav-trading').click(function(e){
				$(".content-ico-about").hide();
				$(".content-ico-trading").show();
				$(".content-ico-financial").hide();
				$(".content-ico-detail").hide();
			});
			$('#nav-financial').click(function(e){
				$(".content-ico-about").hide();
				$(".content-ico-trading").hide();
				$(".content-ico-financial").show();
				$(".content-ico-detail").hide();
			});
			$('#nav-detail').click(function(e){
				$(".content-ico-about").hide();
				$(".content-ico-trading").hide();
				$(".content-ico-financial").hide();
				$(".content-ico-detail").show();
			});
    });
  </script>
	
@endsection
