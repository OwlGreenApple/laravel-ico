@extends('layouts.app')

@section('content')
	<link href="{{ asset('css/search.css') }}" rel="stylesheet">
	
	<div class="container">
		<h1>Check ICO</h1>
		<div class="search-bar row">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Search Name</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-2">
					<label class="control-label">Rating</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-2">
					<label class="control-label">Start</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-2">
					<label class="control-label">End</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Status</label>
					<input type="text" class="form-control">
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
			<div class="row div-expand">
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Category</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Country</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Platform</label>
					<input type="text" class="form-control">
				</div>
				<div class="col-xs-12 col-md-3">
					<label class="control-label">Accepted Currency</label>
					<input type="text" class="form-control">
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
    });
  </script>		
	
@endsection
