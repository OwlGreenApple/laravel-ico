@extends('layouts.app')

@section('content')
	<link href="{{ asset('css/premium.css') }}" rel="stylesheet">
	
	<div class="container main-banner">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h1 align="center">Become Premium User Now <i class="premium-icon"></i></h1>
				<p align="center">Register your ICO for <a href="{{url('publish/free')}}" style="color:#FFDC6E;">free</a> or </p>
				<p align="center">Get more Benefit with <br>
				Our ICO Registration <b>Premium Services</b> NOW 
				</p>
			</div>  
		</div>  
	</div>
	
	<div class="container" style="margin-bottom:20px;">
		<div class="row">
			<div class="">
				<div class="col-xs-12 col-md-12 alert alert-success" id="alert" style="text-align:center;display:none;">
					<b>Thank you for choosing one of our VIP packages. </b> <br>
					Please check your email for the next step.
				</div>
			</div>  
		</div>  
	</div>
	
	<div class="container choose-package">
		<div class="row">
			<div class="col-xs-12 col-md-3 wrap-choose-package">
				<input type="button" value="Basic" class="form-control btn header-package btn-basic">
				
				<div class="content-package">
					<p class="price">3 ETH</p>
				
					<p>7 days Featured Listing</p>
					<p>1 Broadcast by Email</p> 
					<p>1 Broadcast on web notification</p>
					<p>1 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will be shown on your ICO profile</p>
					<!--<p>Your ICO will not be shown on competitor’s profile </p>-->
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order" data-eth="3" data-package="basic">
			</div>  
			
			<div class="col-xs-12 col-md-3 wrap-choose-package wrap-choose-package-boost">
				
				<div class="content-package content-boost">
					<div class="btn header-package btn-boost">
						Boost 
						<p class="price"> 9 ETH </p>
					</div>
					<p>15 days Featured Listing</p>
					<p>3 Broadcast by Email </p>
					<p>3 Broadcast on web notification</p>
					<p>3 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will not be shown on your ICO profile</p>
					<p>Your ICO will be shown on competitor’s profile </p>
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order btn-order-boost" data-eth="9" data-package="boost">
			</div>  
			
			<div class="col-xs-12 col-md-3 wrap-choose-package">
				<input type="button" value="Premium" class="form-control btn header-package btn-premium">
				
				<div class="content-package">
					<p class="price">20 ETH</p>
				
					<p>45 days Featured Listing</p>
					<p>6 Broadcast by Email </p>
					<p>6 Broadcast on web notification</p>
					<p>6 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will not be shown on your ICO profile</p>
					<p>Your ICO will be shown on competitor’s profile</p>
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order" data-eth="20" data-package="premium">
			</div>  
			
			<div class="col-xs-12 col-md-3 wrap-choose-package">
				<input type="button" value="Platinum" class="form-control btn header-package btn-platinum">
				
				<div class="content-package">
					<p class="price">30 ETH</p>
				
					<p>60 days Featured Listing</p>
					<p>10 Broadcast by Email </p>
					<p>10 Broadcast on web notification</p>
					<p>10 Telegram channel boost</p>
					<p>Rated by ICOCheckr</p>
					<p>ICOCheckr’s Badge for your website</p>
					<p>Competitor will not be shown on your ICO profile</p>
					<p>Your ICO will be shown on competitor’s profile</p>
				
				</div>
				
				<input type="button" value="Order Now" class="form-control btn btn-order" data-eth="30" data-package="platinum">
			</div>  
			
			
		</div>  
	</div>
	
  <script>
		function make_height_same(){
			var max = -1;
			$(".content-package").each(function() {
				var h = $(this).height()+40; // ditambah 40 karena ada padding 20 (top,bottom)
				max = h > max ? h : max;
			});
			$(".content-package").each(function() {
					$(this).height(max); 
			});
			$(".content-boost").height(max-80);
		}
    $(document).ready(function(){
      document.title = 'Premium ICOCheckr Packages';
			make_height_same();
			
			$('.btn-order').click(function(e){
        $.ajax({
          url: '<?php echo url('submit-premium'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          // data: $("#form-publish-ico").serialize(),
          data: {
						eth: $(this).attr("data-eth"),
						package: $(this).attr("data-package"),
					},
          beforeSend: function()
          {
            $("#div-loading").show();
          },
          dataType: 'text',
          success: function(result)
          {
            var data = jQuery.parseJSON(result);
            if(data.type=='success') {
							$("#alert").show();
              $("#alert").addClass("alert-success");
              $("#alert").removeClass("alert-danger");
							$('html, body').animate({scrollTop: $("#alert").offset().top-100}, 500);
            } else if (data.type=='register') {
							console.log("<?php echo url('/register'); ?>");
							window.location.replace("<?php echo url('/register'); ?>");
            }
						$("#div-loading").hide();
          }
        });
			});

    });
  </script>		
	
@endsection
