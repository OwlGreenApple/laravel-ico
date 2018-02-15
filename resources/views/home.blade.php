@extends('layouts.app')

@section('content')

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
