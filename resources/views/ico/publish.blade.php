@extends('layouts.app')

@section('content')
	<script src="{{ asset('/js/jquery.country.select.js') }}"></script>
	<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/datepicker.js') }}"></script>
	<link href="{{ asset('css/publish.css') }}" rel="stylesheet">
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-9 col-xs-offset-0 col-md-offset-1">
				<h1 align="center">Publish an ICO</h1>
				<p align="center">Fill this form to publish your ICO</p>
			</div>  
		</div>  
	</div>
	<form enctype="multipart/form-data" id="form-publish-ico">
	<div class="container">
		<div class="row">
			<div class="alert alert-danger" id="alert" style="display:none;">
			</div>
			<div class="col-xs-12 col-md-5">
				<div class="row">
					<label class="control-label">Type of Application</label>
					<!--<input type="text" class="form-control" id="" name="">-->
					<select class="form-control" id="type-application" name="type_application">
					<?php if ($package==""){ ?>
						<option value="free">Free</option>
						<option value="basic">Basic(3ETH)</option>
						<option value="boost">Boost(9ETH)</option>
						<option value="premium">Premium(20ETH)</option>
						<option value="platinum">Platinum(30ETH)</option>
					<?php }
					else if ($package=="free"){
					?>
						<option value="free">Free</option>
					<?php } 
					else if ($package=="basic"){
					?>
						<option value="basic">Basic(3ETH)</option>
					<?php } 
					else if ($package=="boost"){
					?>
						<option value="boost">Boost(9ETH)</option>
					<?php } 
					else if ($package=="premium"){
					?>
						<option value="premium">Premium(20ETH)</option>
					<?php } 
					else if ($package=="platinum"){
					?>
						<option value="platinum">Platinum(30ETH)</option>
					<?php } ?>
					</select>
					
				</div>
				<div class="row">
					<label class="control-label">ICO NAME</label>
					<input type="text" class="form-control" id="" name="ico_name" placeholder="ICO Name">
				</div>
				<div class="row">
					<label class="control-label">Website URL</label>
					<input type="text" class="form-control" id="" name="ofc_website" placeholder="Link here">
				</div>
				<div class="row">
					<label class="control-label">About</label>
					<textarea class="form-control" rows="3" id="" name="about" placeholder="Tell us about your ICO"></textarea>
				</div>
				<div class="row">
					<label class="control-label">Description</label>
					<textarea class="form-control" rows="3" id="" name="description" placeholder="Tell us about your ICO"></textarea>
				</div>
				<div class="row">
					<label class="control-label">Country of Operation</label>
					<select class="form-control" id="country-operation" name="country_operation" placeholder="Name of country">
					</select>
				</div>
				<div class="row">
					<label class="control-label">Pre ICO Start and End date</label>
					<input type="text" class="form-control" id="" name="sale_date" placeholder="Pre ICO start and end date">
				</div>
			</div>  
			<div class="col-xs-12 col-md-1">
				&nbsp
			</div>  
			<div class="col-xs-12 col-md-5">
				<div class="row">
					<label class="control-label">Categories</label>
					<textarea name="categories" id="categories" placeholder="Categories of your project"></textarea>
					<script>
						var selectCategories = $('#categories').selectize({
							plugins:['remove_button'],
							delimiter: ';',
							persist: false,
							create: function(input) {
								return {
									value: input,
									text: input
								}
							},
						});
						
						var selectizeCategories = selectCategories[0].selectize;

					</script>
				</div>
				<div class="row">
					<label class="control-label">Token Ticker</label>
					<input type="text" class="form-control" id="" name="token_ticker" placeholder="Ticker of your token">
				</div>
				<div class="row">
					<label class="control-label">Link whitepaper</label>
					<input type="text" class="form-control" id="" name="link_whitepaper" placeholder="Link here">
				</div>
				<div class="row">
					<label class="control-label">Link bounty</label>
					<input type="text" class="form-control" id="" name="link_bounty" placeholder="Link here">
				</div>
				<div class="row">
					<label class="control-label">Platform</label>
					<select class="form-control" id="platform" name="platform">
						<option value="none">Select Platform</option>
						<option value="bitcoin">Bitcoin</option>
						<option value="ethereum">Ethereum</option>
						<option value="stellar">Stellar</option>
						<option value="neo">Neo</option>
						<option value="waves">Waves</option>
						<option value="ardor">Ardor</option>
						<option value="etc">etc</option>
					</select>
				</div>
				<div class="row">
					<label class="control-label">Price</label>
					<input type="text" class="form-control" id="" name="price" placeholder="e.g 1ETH = 5000 Mike's token">
				</div>
				<div class="row">
					<label class="control-label">Restrictions</label>
					<input type="text" class="form-control" id="" name="restrictions" placeholder="Name of country">
				</div>
				<div class="row">
					<label class="control-label">Contact email</label>
					<input type="text" class="form-control" id="" name="contact_email" placeholder="put your email here">
				</div>
			</div>  
		</div>  
	</div>  
	</form>
	<div class="container div-button-submit">
		<div class="row">
			<!--<div class="col-xs-12 col-md-5">-->
			<div class="col-xs-12 col-md-9 col-xs-offset-0 col-md-offset-1">
				<input type="button" class="form-control btn btn-success" value="SUBMIT" id="button-process">
			</div>  
		</div>  
	</div>  
	
  <script>
    $(document).ready(function(){
      document.title = 'Publish your ICO';

			$('#country-operation').countrySelect();
			selectizeCategories.addOption({value:"Platform",text:"Platform"});
			selectizeCategories.addOption({value:"Cryptocurrency",text:"Cryptocurrency"});
			selectizeCategories.addOption({value:"Business services",text:"Business services"});
			selectizeCategories.addOption({value:"Investment",text:"Investment"});
			selectizeCategories.addOption({value:"Software",text:"Software"});
			selectizeCategories.addOption({value:"Entertainment",text:"Entertainment"});
			selectizeCategories.addOption({value:"Internet",text:"Internet"});
			selectizeCategories.addOption({value:"Banking",text:"Banking"});
			selectizeCategories.addOption({value:"Infrastructure",text:"Infrastructure"});
			selectizeCategories.addOption({value:"Smart Contract",text:"Smart Contract"});
			selectizeCategories.addOption({value:"Communication",text:"Communication"});
			selectizeCategories.addOption({value:"Media",text:"Media"});
			selectizeCategories.addOption({value:"Retail",text:"Retail"});
			selectizeCategories.addOption({value:"Health",text:"Health"});
			selectizeCategories.addOption({value:"Big Data",text:"Big Data"});
			selectizeCategories.addOption({value:"Real estate",text:"Real estate"});
			selectizeCategories.addOption({value:"Casino or Gambling",text:"Casino or Gambling"});
			selectizeCategories.addOption({value:"AI",text:"AI"});
			selectizeCategories.addOption({value:"Tourism",text:"Tourism"});
			selectizeCategories.addOption({value:"Education",text:"Education"});
			selectizeCategories.addOption({value:"Manufacturing",text:"Manufacturing"});
			selectizeCategories.addOption({value:"Sports",text:"Sports"});
			selectizeCategories.addOption({value:"Energy",text:"Energy"});
			selectizeCategories.addOption({value:"VR or AR",text:"VR or AR"});
			selectizeCategories.addOption({value:"Charity",text:"Charity"});
			selectizeCategories.addOption({value:"Legal",text:"Legal"});
			selectizeCategories.addOption({value:"Art",text:"Art"});
			selectizeCategories.addOption({value:"Transportation",text:"Transportation"});
			selectizeCategories.addOption({value:"Gaming",text:"Gaming"});
			selectizeCategories.addOption({value:"Travelling",text:"Travelling"});
			selectizeCategories.addOption({value:"Skills",text:"Skills"});
			selectizeCategories.addOption({value:"Other",text:"Other"});
			
			$('#button-process').click(function(e){
        $.ajax({
          url: '<?php echo url('submit-publish-ico'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          data: $("#form-publish-ico").serialize(),
          beforeSend: function()
          {
            $("#div-loading").show();
          },
          dataType: 'text',
          success: function(result)
          {
            var data = jQuery.parseJSON(result);
            $("#alert").show();
            $("#alert").html(data.message);
            if(data.type=='success') {
              $("#alert").addClass("alert-success");
              $("#alert").removeClass("alert-danger");
            } else if (data.type=='error') {
              $("#alert").addClass("alert-danger");
              $("#alert").removeClass("alert-success");
            }
						$("#div-loading").hide();
          }
        });
			});
			
			
    });
  </script>		
	
@endsection
