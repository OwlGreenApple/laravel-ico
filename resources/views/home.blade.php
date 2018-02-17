@extends('layouts.app')

@section('content')

<script>
		$(document).ready(function() {
			$('.responsive-slick').slick({
				dots: true,
				infinite: false,
				speed: 300,
				slidesToShow: 4,
				slidesToScroll: 4,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
							dots: true
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				]
			});			
		});
</script>

<div class="background-banner">
	<div class="container">
		<h1>
			Check ICO BETTER with <br>
			ICOCHECKR
		</h1>
		<p>
			Get the Latest update of ICO Ratings <br>
			from Expert
		</p>
		<a href="{{ url('/icos') }}">
			<button>
				Check ICO
			</button>
		</a>
	</div>
</div>

<div class="container home-slideshow">
	<div class="responsive-slick">
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
		<div class="ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
		</div>
	</div>
</div>

<div class="container main-ico-home">
    <div class="row gap-blue">
			<h2>
				Check ICO
			</h2>
			<p>Select ICO Category</p>
		</div>
		<div class="row">
			<div class="cover-input-group">
				<div class="col-xs-12 col-md-3">
					<select class="form-control">
					</select>
				</div>
				<div class="col-xs-12 col-md-3">
					<select class="form-control">
					</select>
				</div>
			</div>
		</div>
		<div class="row">
		
			<!-- data record  -->
			<div class="col-xs-12 col-md-3 ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
				<a href="" class="link-view-more">View More</a>
			</div>
			<div class="col-xs-12 col-md-3 ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
				<a href="" class="link-view-more">View More</a>
			</div>
			<div class="col-xs-12 col-md-3 ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
				<a href="" class="link-view-more">View More</a>
			</div>
			<div class="col-xs-12 col-md-3 ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
				<a href="" class="link-view-more">View More</a>
			</div>
			<div class="col-xs-12 col-md-3 ico-list">
				<h3>ICO NAME</h3>
				<div class="banner-ico">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
					The worlds first decentralized 
					blockchain based community driven
					marketplace ecosystem.
				</p>
				<a href="" class="link-view-more">View More</a>
			</div>
			
		</div>
</div>

<div class="container">
    <div class="row">
		<!--
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

										@guest
										@else
											You are logged in!
										@endguest
                </div>
            </div>
        </div>
		-->
    </div>
</div>
@endsection
