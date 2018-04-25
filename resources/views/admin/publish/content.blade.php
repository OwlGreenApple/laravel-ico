  <table class="table table-bordered">  
    <thead>
      <tr>
        <th>No. </th>
        <th>Package</th>
        <th>Ico Name</th>
        <th>Website</th>
        <th>Created</th>
        <th>Updated</th>
        <th></th>
      </tr>      
    </thead>
    
    
    <tbody>
		
		<?php 
			use Icocheckr\Meta;
			use Icocheckr\User;
			if ( $arr->count()==0  ) {
				echo "<tr><td colspan='7' align='center'>Data tidak ada</td></tr>";
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
						{{$data_arr->type_application}}
					</td>
					<td>
						{{$data_arr->ico_name}}
					</td>
					<td>
						{{$data_arr->ofc_website}}
					</td>
					<td>
						{{$data_arr->created_at}}
					</td>
					<td>
						{{$data_arr->updated_at}}
					</td>
					<td align="center">
						<?php 
							$user_email = "-";
							$user = User::find($data_arr->user_id);
							if (!is_null($user)) {
								$user_email = $user->email;
							}
						?>
						<button type="button" class="btn btn-warning btn-show" data-toggle="modal" data-target="#myModalIco" data-id="{{$data_arr->id}}" data-type_application="{{$data_arr->type_application}}" data-ico_name="{{$data_arr->ico_name}}" data-categories="{{$data_arr->categories}}" data-ofc_website="{{$data_arr->ofc_website}}" data-about="{{$data_arr->about}}" data-description="{{$data_arr->description}}" data-sale_date="{{$data_arr->sale_date}}" data-token_ticker="{{$data_arr->token_ticker}}" data-link_whitepaper="{{$data_arr->link_whitepaper}}" data-link_bounty="{{$data_arr->link_bounty}}" data-platform="{{$data_arr->platform}}" data-price="{{$data_arr->price}}" data-restrictions="{{$data_arr->restrictions}}" data-contact_email="{{$data_arr->contact_email}}" data-status="{{$data_arr->status}}" data-user-email="{{$user_email}}" style="margin-bottom:10px;">
							Show
						</button>

						<?php if ($data_arr->status=="pending") {?>
						<button type="button" class="btn btn-success btn-confirm" style="margin-bottom:10px;" data-id="{{$data_arr->id}}" >
							Confirm
						</button>
						<?php } ?>
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

