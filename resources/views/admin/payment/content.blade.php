  <table class="table table-bordered">  
    <thead>
      <tr>
        <th>No. </th>
        <th>Order No</th>
        <th>Total</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Screenshoot</th>
        <th></th>
      </tr>      
    </thead>
    
    
    <tbody>
		
		<?php 
			use Icocheckr\Meta;
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
						{{$data_arr->no_order}}
					</td>
					<td>
						{{number_format($data_arr->total, 8, '.', '0')}}
					</td>
					<td>
						{{$data_arr->created_at}}
					</td>
					<td>
						{{$data_arr->updated_at}}
					</td>
					<td align="center">
						<?php if ($data_arr->image=="") { echo "-";}
						else {
						?>
						<a href="" class="popup-newWindow"><img src="{{url('confirm-payment-file/'.$data_arr->image)}}" style="width:70px;"></a>
						<?php } ?>
					</td>
					<td align="center">
						<?php if ($data_arr->status=="user-confirm") { ?>
						<button type="button" class="btn btn-warning btn-update" data-toggle="modal" data-target="#myModalIco" data-id="{{$data_arr->id}}" style="margin-bottom:10px;">
							Accept
						</button>
						
						<button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#confirm-delete" data-id="{{$data_arr->id}}" style="margin-bottom:10px;">
							Reject
						</button>
						<?php }
						else {
							echo $data_arr->status;
						}
						?>
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

