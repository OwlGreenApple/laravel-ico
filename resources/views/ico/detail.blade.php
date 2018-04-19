@extends('layouts.app')

@section('content')
	<?php 
		use Icocheckr\Meta;
	?>
	<link href="{{ asset('css/detail.css') }}" rel="stylesheet">
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-9 pull-right main-part">
			
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="banner-ico fl">
							<img src="{{asset('images/logo-ico').'/'.$ico->logo}}" class="ico-logo">
						</div>
						<div class="banner-name fl">
							<h1>{{$ico->name}}</h1>
							<h2>{{$ico->tagline}}</h2>
						</div>
						<div class="fn"></div>
					</div>
				</div>

				<div class="navbar navbar-default navbar-static-top navbar-detail">
					<ul class="nav navbar-nav">
						<li><a href="#" class="nav-content" id="nav-about">About</a></li>
						<!--<li><a href="#" class="nav-content" id="nav-trading">Trading</a></li>-->
						<li><a href="#" class="nav-content" id="nav-financial">Financial</a></li>
						<li><button class="btn" id="btn-bookmark">Bookmark</button></li>
					</ul>
				</div>
				
				<div class="main-content content-ico-about">
					<?php echo $ico->description; ?>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="{{$ico->url_link_video}}" allowfullscreen></iframe>
					</div>					
					<?php echo $ico->about; ?>
				</div>
				
				<!--<div class="main-content content-ico-trading">
				</div>-->
				
				<div class="main-content content-ico-financial">
					<?php echo $ico->financial; ?>
				</div>
				
			</div>

			<div class="col-xs-12 col-md-3 pull-left side-part">
				<div class="div-rating row">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<h3 class="label-header-rating">ICO Detail</h3>
						</div>
					</div>
					<hr class="row">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<label class="">Token</label>
							<p class="description"><?php if ($ico->token_ticker=="") { echo "-"; } else { echo $ico->token_ticker; } ?></p>
						</div>
						
						<div class="col-xs-12 col-md-12">
							<label>Price</label>
							<p class="description"><?php if ($ico->price=="") { echo "-"; } else { echo $ico->price; } ?></p>
						</div>
						
						<div class="col-xs-12 col-md-12">
							<label>Country</label>
							<p class="description"><?php if ($ico->country_operation=="") { echo "-"; } else { echo $ico->country_operation; } ?></p>
						</div>
						
						<div class="col-xs-12 col-md-12">
							<label>Status</label>
							<p class="description"><?php if ($ico->status=="") { echo "-"; } else { echo $ico->status; } ?></p>
						</div>
						
						<div class="col-xs-12 col-md-12">
							<label>Presale</label>
							<p class="description"><?php if ($ico->presale_start=="") { echo "-"; } else { echo $ico->presale_start; } ?></p>
						</div>
						
						<div class="col-xs-12 col-md-12">
							<label>Restrictions</label>
							<p class="description"><?php if ($ico->restrictions=="") { echo "-"; } else { echo $ico->restrictions; } ?></p>
						</div>
						
					</div>
				</div>
				<div class="div-rating row">
					<div class="row">
						<div class="col-xs-5 col-md-5">
							<span class="label-header-rating">Rating</span>
						</div>
						<div class="col-xs-5 col-md-5 col-lg-offset-1">	
							<?php if (!is_null($ico->rating)) { ?>
							<span class="label-header-rating-value pull-right"><?php 
								if ($ico->rating  > 9.5) {
									echo "AAA";
								}
								else if ($ico->rating  > 9) {
									echo "AA";
								}
								else if ($ico->rating  > 8.5) {
									echo "A";
								}
								else if ($ico->rating  > 8) {
									echo "BBB";
								}
								else if ($ico->rating  > 7.5) {
									echo "BB";
								}
								else if ($ico->rating  > 7) {
									echo "B";
								}
								else if ($ico->rating  > 6.5) {
									echo "CCC";
								}
								else if ($ico->rating  > 6) {
									echo "CC";
								}
								else if ($ico->rating  > 5.5) {
									echo "C";
								}
								else if ($ico->rating  < 5.5) {
									echo "D";
								}
							?></span>
							<?php } ?>
						</div>
					</div>
					<hr class="row">
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Project</p>
							<p class="label-rating-value"><?php if (is_null($ico->rating_project)) { echo "-"; } else {echo number_format($ico->rating_project, 1, '.', '');} ?></p>
						</div>
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Profile</p>
							<p class="label-rating-value"><?php if (is_null($ico->rating_profile)) { echo "-"; } else {echo number_format($ico->rating_profile, 1, '.', '');} ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Team</p>
							<p class="label-rating-value"><?php if (is_null($ico->rating_team)) { echo "-"; } else {echo number_format($ico->rating_team, 1, '.', '');} ?></p>
						</div>
						<div class="col-xs-6 col-md-6">
							<p class="label-rating">Hype</p>
							<p class="label-rating-value"><?php if (is_null($ico->rating_hype)) { echo "-"; } else {echo number_format($ico->rating_hype, 1, '.', '');} ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<a href="{{$ico->ofc_website}}"><input type="button" class="btn btn-buy form-control" value="Buy ICO"></a>
						</div>
					</div>
				</div>
				<div class="mini-icon row">
					<?php if ($ico->ofc_website<>"") {?>
					<a class="icon icon-1" href="{{$ico->ofc_website}}" target="_blank"></a>
					<?php } ?>
					
					<?php if (Meta::getMeta("github_link","icos",$ico->id)<>"") {?>
					<a class="icon icon-2" href='Meta::getMeta("github_link","icos",$ico->id)' target="_blank"></a>
					<?php } ?>
					
					<?php if (Meta::getMeta("facebook_link","icos",$ico->id)<>"") {?>
					<a class="icon icon-3" href='{{Meta::getMeta("facebook_link","icos",$ico->id)}}' target="_blank"></a>
					<?php } ?>
					
					<?php if (Meta::getMeta("twitter_link","icos",$ico->id)<>"") {?>
					<a class="icon icon-4" href='{{Meta::getMeta("twitter_link","icos",$ico->id)}}' target="_blank"></a>
					<?php } ?>
					
					<?php if (Meta::getMeta("bitcointalk_link","icos",$ico->id)<>"") {?>
					<a class="icon icon-5" href='{{Meta::getMeta("bitcointalk_link","icos",$ico->id)}}' target="_blank"></a>
					<?php } ?>
					
					<?php if (Meta::getMeta("telegram_link","icos",$ico->id)<>"") {?>
					<a class="icon icon-6" href='{{Meta::getMeta("telegram_link","icos",$ico->id)}}' target="_blank"></a>
					<?php } ?>
					
					<?php if (Meta::getMeta("medium_link","icos",$ico->id)<>"") {?>
					<a class="icon icon-7" href='{{Meta::getMeta("medium_link","icos",$ico->id)}}' target="_blank"></a>
					<?php } ?>
					
					<?php if (Meta::getMeta("reddit_link","icos",$ico->id)<>"") {?>
					<a class="icon icon-8" href='Meta::getMeta("reddit_link","icos",$ico->id)' target="_blank"></a>
					<?php } ?>
				</div>
			</div>
		
		</div>
	</div>

  <script>
    $(document).ready(function(){
      document.title = 'ICO rating and details';
			// $("#nav-about").trigger("click");
			$("#nav-about").addClass("active");
			$(".content-ico-about").show();
			// $(".content-ico-trading").hide();
			$(".content-ico-financial").hide();
			
			$('#nav-about').click(function(e){
				$(".nav-content").removeClass("active");
				$(this).addClass("active");
				
				$(".content-ico-about").show();
				// $(".content-ico-trading").hide();
				$(".content-ico-financial").hide();
			});
			$('#nav-trading').click(function(e){
				$(".nav-content").removeClass("active");
				$(this).addClass("active");
				
				$(".content-ico-about").hide();
				// $(".content-ico-trading").show();
				$(".content-ico-financial").hide();
			});
			$('#nav-financial').click(function(e){
				$(".nav-content").removeClass("active");
				$(this).addClass("active");

				$(".content-ico-about").hide();
				// $(".content-ico-trading").hide();
				$(".content-ico-financial").show();
			});
    });
  </script>
	
@endsection
