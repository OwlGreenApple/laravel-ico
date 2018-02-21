  <table class="table table-bordered">  
    <thead>
      <tr>
        <th>No. </th>
        <th>ICO name</th>
        <th>Rating</th>
        <th>Status</th>
        <th>Created</th>
        <th></th>
      </tr>      
    </thead>
    
    
    <tbody>
		
		<?php 
			if ( $arr->count()==0  ) {
				echo "<tr><td colspan='11' align='center'>Data tidak ada</td></tr>";
			} else {
				//search by username
			$i=1;
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
						{{$data_arr->rating}}
					</td>
					<td>
						{{$data_arr->status}}
					</td>
					<td>
						{{$data_arr->created_at}}
					</td>
					<td align="center">
						
						<button type="button" class="btn btn-warning btn-update" data-toggle="modal" data-target="#myModalIco" data-id="{{$data_arr->id}}" data-name="{{$data_arr->name}}" data-rating="{{$data_arr->rating}}" data-about="{{$data_arr->about}}" data-description="{{$data_arr->description}}" data-categories="{{$data_arr->categories}}" data-status="{{$data_arr->status}}" data-url_link_video="{{$data_arr->url_link_video}}" data-url_link_blog="{{$data_arr->url_link_blog}}" data-ofc_website="{{$data_arr->ofc_website}}" data-price="{{$data_arr->price}}" >
							Edit
						</button>
						
						<button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#confirm-delete" data-id="{{$data_arr->id}}" >
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
			if ($page=="") {
				$currentPage = 1;
			} else {
				$currentPage = $page;
			}
			
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
		refresh_page(page);
	});

  $(document).ready(function(){
  });

</script>		

