@extends('layouts.app')

@section('content')
	<script src="{{ asset('/js/jquery.country.select.js') }}"></script>
	<link href="{{ asset('css/search.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/datepicker.js') }}"></script>
	<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">
	
	<div class="container">
		<h1>Check ICO</h1>
		<div class="search-bar row">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Search Name</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Rating</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Start</label>
					<input type="text" class="form-control formatted-date">
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">End</label>
					<input type="text" class="form-control formatted-date">
				</div>
			</div>
			<div class="row div-expand">
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Status</label>
					<select class="form-control" id="select-status">
						<option value="any">Any</option>
						<option value="upcoming">Upcoming</option>
						<option value="ongoing">Ongoing</option>
						<option value="onexchange">Onexchange</option>
					</select>
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Category</label>
					<select class="form-control" id="select-category">
					</select>
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Country</label>
					<select class="form-control" id="country-operation" name="country_operation">
					</select>
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Platform</label>
					<select class="form-control" id="platform" name="platform">
						<option value="any">Any</option>
						<option value="bitcoin">Bitcoin</option>
						<option value="ethereum">Ethereum</option>
						<option value="stellar">Stellar</option>
						<option value="neo">Neo</option>
						<option value="waves">Waves</option>
						<option value="ardor">Ardor</option>
						<option value="etc">etc</option>
					</select>
				</div>
			</div>
			<div class="row div-collapse">
				<div class="col-xs-12 col-md-2">
					<label class="control-label"></label>
					<input type="button" class="btn btn-search form-control" value="Search">
				</div>
				<div class="col-xs-12 col-md-2">
					<label class="control-label"></label>
					<input type="button" class="btn btn-hide-expand form-control" id="btn-expand" value="Expand Search">
				</div>
			</div>
			<div class="row div-expand" >
				<div class="col-xs-12 col-md-2">
					<label class="control-label"></label>
					<input type="button" class="btn btn-search form-control" value="Search">
				</div>
				<div class="col-xs-12 col-md-2">
					<label class="control-label"></label>
					<input type="button" class="btn btn-filter form-control" value="Clear Filter">
				</div>
				<div class="col-xs-12 col-md-2">
					<label class="control-label"></label>
					<input type="button" class="btn btn-hide-expand form-control" id="btn-collapse" value="Hide Search">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12" id="content">
			</div>  
		</div>  
	</div>  
	
  <script>
    function refresh_page(page)
    {
      $.ajax({
        url: '<?php echo url('load-ico'); ?>',
        type: 'get',
        data: {
          page: page,
					// filename: $("#file-name").val(),
        },
        beforeSend: function()
        {
          $("#div-loading").show();
        },
        dataType: 'text',
        success: function(result)
        {
          $('#content').html(result);
          $("#div-loading").hide();
        }
      });
    }
    $(document).ready(function(){
      document.title = 'ICO discovery and rating platform';
			refresh_page(1);
			$(".div-collapse").hide();
			$(".div-expand").show();
			
			$('#btn-collapse').click(function(e){
				$(".div-collapse").show();
				$(".div-expand").hide();
			});
			$('#btn-expand').click(function(e){
				$(".div-collapse").hide();
				$(".div-expand").show();
			});
			
			$('#select-category').append($('<option>', {value:"All",text:"All"}));
			$('#select-category').append($('<option>', {value:"Platform",text:"Platform"}));
			$('#select-category').append($('<option>', {value:"Cryptocurrency",text:"Cryptocurrency"}));
			$('#select-category').append($('<option>', {value:"Business services",text:"Business services"}));
			$('#select-category').append($('<option>', {value:"Investment",text:"Investment"}));
			$('#select-category').append($('<option>', {value:"Software",text:"Software"}));
			$('#select-category').append($('<option>', {value:"Entertainment",text:"Entertainment"}));
			$('#select-category').append($('<option>', {value:"Internet",text:"Internet"}));
			$('#select-category').append($('<option>', {value:"Banking",text:"Banking"}));
			$('#select-category').append($('<option>', {value:"Infrastructure",text:"Infrastructure"}));
			$('#select-category').append($('<option>', {value:"Smart Contract",text:"Smart Contract"}));
			$('#select-category').append($('<option>', {value:"Communication",text:"Communication"}));
			$('#select-category').append($('<option>', {value:"Media",text:"Media"}));
			$('#select-category').append($('<option>', {value:"Retail",text:"Retail"}));
			$('#select-category').append($('<option>', {value:"Health",text:"Health"}));
			$('#select-category').append($('<option>', {value:"Big Data",text:"Big Data"}));
			$('#select-category').append($('<option>', {value:"Real estate",text:"Real estate"}));
			$('#select-category').append($('<option>', {value:"Casino or Gambling",text:"Casino or Gambling"}));
			$('#select-category').append($('<option>', {value:"AI",text:"AI"}));
			$('#select-category').append($('<option>', {value:"Tourism",text:"Tourism"}));
			$('#select-category').append($('<option>', {value:"Education",text:"Education"}));
			$('#select-category').append($('<option>', {value:"Manufacturing",text:"Manufacturing"}));
			$('#select-category').append($('<option>', {value:"Sports",text:"Sports"}));
			$('#select-category').append($('<option>', {value:"Energy",text:"Energy"}));
			$('#select-category').append($('<option>', {value:"VR or AR",text:"VR or AR"}));
			$('#select-category').append($('<option>', {value:"Charity",text:"Charity"}));
			$('#select-category').append($('<option>', {value:"Legal",text:"Legal"}));
			$('#select-category').append($('<option>', {value:"Art",text:"Art"}));
			$('#select-category').append($('<option>', {value:"Transportation",text:"Transportation"}));
			$('#select-category').append($('<option>', {value:"Gaming",text:"Gaming"}));
			$('#select-category').append($('<option>', {value:"Travelling",text:"Travelling"}));
			$('#select-category').append($('<option>', {value:"Skills",text:"Skills"}));
			$('#select-category').append($('<option>', {value:"Other",text:"Other"}));
			
			$('#country-operation').countrySelect();
      $('.formatted-date').datepicker({
        format: 'Y-m-d',
        // format: 'Y-MM-DD HH:mm',
        // format: 'YYYY-MM-DD HH:mm',
      });
    });
  </script>		
	
@endsection
