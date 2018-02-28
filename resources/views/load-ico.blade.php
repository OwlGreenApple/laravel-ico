<?php 
	foreach($arr as $data) {
?>
			<div class="col-xs-12 col-md-3 ico-list">
				<h3>{{$data->name}}</h3>
				<div class="banner-ico">
					<img src="{{asset('images/logo-ico').'/'.$data->logo}}" class="ico-logo">
				</div>
				<label>Rate </rate> <span class="rate-ico-list">AAA</span>
				<p>
				<?php echo substr($data->description, 0, 250); ?>
				</p>
				<a href="{{ url('/ico').'/'.$data->name }}" class="link-view-more">View More</a>
			</div>
	<?php } ?>