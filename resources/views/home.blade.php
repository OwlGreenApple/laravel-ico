@extends('layouts.app')

@section('content')

<script>
    function load_ico_home()
    {
      $.ajax({
        url: '<?php echo url('load-ico-home'); ?>',
        type: 'get',
        data: {
					s:$("#select-category").val(),
        },
        beforeSend: function()
        {
          $("#div-loading").show();
        },
        dataType: 'text',
        success: function(result)
        {
          $('#div-ico-home').html(result);
          $("#div-loading").hide();
					make_height_same();
        }
      });
    }
    function load_ico_home_banner()
    {
      $.ajax({
        url: '<?php echo url('load-ico-home-banner'); ?>',
        type: 'get',
        data: {
					// filename: $("#file-name").val(),
        },
        beforeSend: function()
        {
          $("#div-loading").show();
        },
        dataType: 'text',
        success: function(result)
        {
          $('#div-ico-home-banner').html(result);
          $("#div-loading").hide();
					
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
        }
      });
    }
		
		function make_height_same(){
			var max = -1;
			$(".ico-list").each(function() {
				var h = $(this).height(); // ditambah 40 karena ada padding 20 (top,bottom)
				max = h > max ? h : max;
			});
			$(".ico-list").each(function() {
					$(this).height(max); 
			});
		}
		
		$(document).ready(function() {
			load_ico_home_banner();
			load_ico_home();
			make_height_same();
			
			$('#select-category').append($('<option>', {value:"all",text:"All"}));
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
			
			$('#select-category').change(function() {
				load_ico_home();
				make_height_same();
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
		<a href="{{ url('/ico') }}">
			<button>
				Check ICO
			</button>
		</a>
	</div>
</div>

<div class="home-find-more">
	<div class="container">
		<h3>
			Find Out More
		</h3>
		<p>
			Want the latest news about ico in ICOCHECKR ? join our Social Media <br>
			Now
		</p>
		<div class="row find-more-icon">
			<a href="https://www.facebook.com/icocheckr/" target="_blank"><i class="icon icon-fb"></i></a>
			<a href="https://instagram.com/icocheckr" target="_blank"><i class="icon icon-ig"></i></a>
			<a href="https://twitter.com/icocheckr" target="_blank"><i class="icon icon-twitter"></i></a>
			<a href="https://t.me/icocheckr" target="_blank"><i class="icon icon-telegram"></i></a>
		</div>
	</div>
</div>

<div class="container home-slideshow">
	<div class="responsive-slick" id="div-ico-home-banner">
	</div>
</div>

<div class="container main-ico-home">
    <div class="row gap-blue">
			<div class="col-xs-12 col-md-4">
				<h3 style="text-align:center;">
					<a href="{{url('ico/ongoing')}}">Ongoing</a>
				</h3>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 style="text-align:center;">
					<a href="{{url('ico/upcoming')}}">Upcoming</a>
				</h3>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 style="text-align:center;">
					<a href="{{url('ico/ended')}}">Ended</a>
				</h3>
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
					<select class="form-control" id="select-category">
					</select>
				</div>
				<!--<div class="col-xs-12 col-md-3">
					<select class="form-control">
					</select>
				</div>-->
			</div>
		</div>
		<div class="row" id="div-ico-home">
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
