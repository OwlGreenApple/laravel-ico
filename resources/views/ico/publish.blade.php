@extends('layouts.app')

@section('content')
	<link href="{{ asset('css/search.css') }}" rel="stylesheet">
	
	<div class="container">
		<h1 align="center">Publish an ICO</h1>
		<p align="center">Fill this form to publish your ICO</p>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-5">
				<div class="row">
					<label class="control-label">Type of Application</label>
					<input type="text" class="form-control" id="" name="">
				</div>
				<div class="row">
					<label class="control-label">ICO NAME</label>
					<input type="text" class="form-control" id="" name="">
				</div>
				<div class="row">
					<label class="control-label">Tell us about your ICO</label>
					<textarea class="form-control" rows="3" id="" name=""></textarea>
				</div>
				<div class="row">
					<label class="control-label">Country of Operation</label>
					<input type="text" class="form-control" id="" name="">
				</div>
				<div class="row">
					<label class="control-label">Pre ICO Start and End date</label>
					<input type="text" class="form-control" id="" name="">
				</div>
			</div>  
			<div class="col-xs-12 col-md-2">
			&nbsp
			</div>  
			<div class="col-xs-12 col-md-5">
			</div>  
		</div>  
	</div>  
	
  <script>
    $(document).ready(function(){
      document.title = 'ICO rating and details';
			
    });
  </script>		
	
@endsection
