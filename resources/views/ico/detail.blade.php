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
			<div class="col-xs-12 col-md-10 pull-right navbar navbar-default navbar-static-top">
				<ul class="nav navbar-nav">
					<li><a href="https://icocheckr.com/article/first-step/">About</a></li>
					<li ><a href="{{ url('/ico') }}">Trading</a></li>
					<li ><a href="{{ url('/publish') }}">Financial</a></li>
					<li ><a href="{{ url('/login') }}">Details</a></li>
					<li ><a href="{{ url('/login') }}">Bookmark</a></li>
				</ul>
				<div>
				</div>
			</div>
			
			
			<div class="col-xs-12 col-md-2 pull-right">
				<div class="div-rating row">
					Rating
					AAA
					<hr class="row">
					<input type="button" class="btn" value="Buy ICO">
				</div>
				<div class="mini-icon row">
				</div>
			</div>
		</div>
	</div>

  <script>
    $(document).ready(function(){
      document.title = 'ICO rating and details';
    });
  </script>
	
@endsection
