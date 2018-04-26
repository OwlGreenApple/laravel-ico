<?php 
	foreach($arr as $data) {
?>
			<div class="col-xs-12 col-md-3 ico-list">
				<h3>{{$data->name}}</h3>
				<div class="banner-ico">
					<img src="{{asset('images/logo-ico').'/'.$data->logo}}" class="ico-logo">
					<?php 
					if ( ($data->package<>"") && (!is_null($data->package_until)) ){ 
					?>
					<i class="emblem emblem-{{$data->package}}"></i>
					<?php } ?>
				</div>
				<label>Rate </rate> <span class="rate-ico-list"><?php 
								if ($data->rating  > 9.5) {
									echo "AAA";
								}
								else if ($data->rating  > 9) {
									echo "AA";
								}
								else if ($data->rating  > 8.5) {
									echo "A";
								}
								else if ($data->rating  > 8) {
									echo "BBB";
								}
								else if ($data->rating  > 7.5) {
									echo "BB";
								}
								else if ($data->rating  > 7) {
									echo "B";
								}
								else if ($data->rating  > 6.5) {
									echo "CCC";
								}
								else if ($data->rating  > 6) {
									echo "CC";
								}
								else if ($data->rating  > 5.5) {
									echo "C";
								}
								else if ($data->rating  < 5.5) {
									echo "D";
								}
							?></span>
				<p>
				<?php 
					$desc = strlen($data->description);
					if ($desc >= 125) {
						echo substr($data->description, 0, 125); 
					}
					else {
						echo $data->description;
					}
				?>
				</p>
				<a href="{{ url('/ico').'/'.$data->name }}" class="link-view-more">View More</a>
			</div>
	<?php } ?>