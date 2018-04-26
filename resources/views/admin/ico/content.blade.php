  <table class="table table-bordered">  
    <thead>
      <tr>
        <th>No. </th>
        <th>ICO name</th>
        <th>Logo</th>
        <th>Rating</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th></th>
      </tr>      
    </thead>
    
    
    <tbody>
		
		<?php 
			use Icocheckr\Meta;
			if ( $arr->count()==0  ) {
				echo "<tr><td colspan='11' align='center'>Data tidak ada</td></tr>";
			} else {
				if ($page=="") {
					$currentPage = 1;
				} else {
					$currentPage = $page;
				}
			
				//search by username
			$i=(($currentPage-1)*15)+1;
			foreach ($arr as $data_arr) {
				?>
				<tr class="row{{$data_arr->id}}">
					<td>
						{{$i}}
					</td>
					<td>
						{{$data_arr->name}}
					</td>
					<td>
						<img src="{{asset('images/logo-ico').'/'.$data_arr->logo}}" class="img-responsive" style="height:50px;">
					</td>
					<td>
						{{$data_arr->rating}}
					</td>
					<td>
						{{$data_arr->status}}
					</td>
					<td>
						{{$data_arr->created_at}}
					</td>
					<td>
						{{$data_arr->updated_at}}
					</td>
					<td align="center">
						
						<button type="button" class="btn btn-warning btn-update" data-toggle="modal" data-target="#myModalIco" data-id="{{$data_arr->id}}" data-name="{{$data_arr->name}}" data-rating="{{$data_arr->rating}}" data-rating-project="{{$data_arr->rating_project}}" data-rating-profile="{{$data_arr->rating_profile}}" data-rating-team="{{$data_arr->rating_team}}" data-rating-hype="{{$data_arr->rating_hype}}" data-about="{{$data_arr->about}}" data-description="{{$data_arr->description}}" data-categories="{{$data_arr->categories}}" data-status="{{$data_arr->status}}" data-url_link_video="{{$data_arr->url_link_video}}" data-url_link_blog="{{$data_arr->url_link_blog}}" data-ofc_website="{{$data_arr->ofc_website}}" data-price="{{$data_arr->price}}" data-platform="{{$data_arr->platform}}" data-country_operation="{{$data_arr->country_operation}}" data-restrictions="{{$data_arr->restrictions}}" data-token_ticker="{{$data_arr->token_ticker}}" data-presale_start="<?php if (!is_null($data_arr->presale_start)) { echo \Carbon::createFromFormat('Y-m-d H:i:s', $data_arr->presale_start)->format('m/d/Y'); } ?>" data-presale_end="<?php if (!is_null($data_arr->presale_end)) { echo \Carbon::createFromFormat('Y-m-d H:i:s', $data_arr->presale_end)->format('m/d/Y'); } ?>" data-sale_start="<?php if (!is_null($data_arr->sale_start)) { echo \Carbon::createFromFormat('Y-m-d H:i:s', $data_arr->sale_start)->format('m/d/Y'); } ?>" data-sale_end="<?php if (!is_null($data_arr->sale_end)) { echo \Carbon::createFromFormat('Y-m-d H:i:s', $data_arr->sale_end)->format('m/d/Y'); } ?>" data-list_exchange="{{$data_arr->list_exchange}}" data-tagline="{{$data_arr->tagline}}" style="margin-bottom:10px;">
							Edit
						</button>
						
						<button type="button" class="btn btn-warning btn-update-logo" data-toggle="modal" data-target="#myModalLogo" data-id="{{$data_arr->id}}" style="margin-bottom:10px;">
							Edit Logo
						</button>
						
						<button type="button" class="btn btn-warning btn-update-description" data-toggle="modal" data-target="#myModalDescription" data-id="{{$data_arr->id}}" data-description="{{$data_arr->description}}" style="margin-bottom:10px;">
							Description
						</button>
						
						<button type="button" class="btn btn-warning btn-update-about" data-toggle="modal" data-target="#myModalAbout" data-id="{{$data_arr->id}}" data-about="{{$data_arr->about}}" style="margin-bottom:10px;">
							About
						</button>
						
						<button type="button" class="btn btn-warning btn-update-financial" data-toggle="modal" data-target="#myModalFinancial" data-id="{{$data_arr->id}}" data-financial="{{$data_arr->financial}}" style="margin-bottom:10px;">
							Financial
						</button>
						
						<button type="button" class="btn btn-warning btn-update-icon" data-toggle="modal" data-target="#myModalIconLink" data-id="{{$data_arr->id}}" data-twitter_link="{{Meta::getMeta('twitter_link','icos',$data_arr->id)}}" data-facebook_link="{{Meta::getMeta('facebook_link','icos',$data_arr->id)}}" data-github_link="{{Meta::getMeta('github_link','icos',$data_arr->id)}}" data-reddit_link="{{Meta::getMeta('reddit_link','icos',$data_arr->id)}}" data-bitcointalk_link="{{Meta::getMeta('bitcointalk_link','icos',$data_arr->id)}}" data-medium_link="{{Meta::getMeta('medium_link','icos',$data_arr->id)}}" data-telegram_link="{{Meta::getMeta('telegram_link','icos',$data_arr->id)}}" style="margin-bottom:10px;">
							Icon link
						</button>
						
						<button type="button" class="btn btn-warning btn-update-premium" data-toggle="modal" data-target="#myModalPremium" data-id="{{$data_arr->id}}" data-package="{{$data_arr->package}}" data-package_until="<?php if (!is_null($data_arr->package_until)) { echo \Carbon::createFromFormat('Y-m-d H:i:s', $data_arr->package_until)->format('m/d/Y'); } ?>" style="margin-bottom:10px;">
							Edit Premium
						</button>
						
						<button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#confirm-delete" data-id="{{$data_arr->id}}" style="margin-bottom:10px;">
							Delete
						</button>
					</td>
				</tr>    

		<?php 
				$i+=1;
			} 
			}
		?>
    </tbody>
  </table>  
	

	<nav>
		<ul class="pagination" id="pagination">
		<?php 
		$counter =0;
		if ( $arr->count()>0  ) {
			$startPage = $currentPage - 4;
			$endPage = $currentPage + 4;

			if ($startPage <= 0) {
					$endPage -= ($startPage - 1);
					$startPage = 1;
			}

			if ($endPage > $totalPage)
					$endPage = $totalPage;

			if ($startPage > 1) { 
			?>
				<li <?php if ($currentPage==1) { echo 'class="active"'; } ?>>
					<a href="#">1</a>
				</li>
				<li>
					<a href="#" style="pointer-events: none;cursor: default;">..</a>
				</li>
			<?php
			}
			
			for($ii=$startPage; $ii<=$endPage; $ii++) {
			?>
				<li <?php if ($currentPage==$ii) { echo 'class="active"'; } ?>>
					<a href="#">{{$ii}}</a>
				</li>
			<?php 
			} 
			
			
			if ($endPage < $totalPage) { 
			?>
				<li>
					<a href="#" style="pointer-events: none;cursor: default;">..</a>
				</li>
				<li <?php if ($currentPage==$totalPage) { echo 'class="active"'; } ?>>
					<a href="#">{{$totalPage}}</a>
				</li>
				
		<?php
			}
		}
		?>
		</ul>
	</nav>  


<script>
	$('#pagination a').click(function(e){
		e.preventDefault();
		e.stopPropagation();
		$("#pagination li").removeClass("active");
		$(this).parent().addClass("active");
		if ($(this).html() == "«") {
			page -= 1; 
		} else 
		if ($(this).html() == "»") {
			page += 1; 
		} else {
			page = parseInt($(this).html());
		}
		pageNow = page;
		refresh_page(page);
	});

  $(document).ready(function(){
  });

</script>		

