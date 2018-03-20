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
	
  <script>
    $(document).ready(function(){
      document.title = 'ICO rating and details';
    });
  </script>
	
@endsection
