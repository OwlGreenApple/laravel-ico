	<hr>
	<table class="table table-bordered">  
    <thead>
      <tr>
        <th>ICO</th>
        <th>ICO Price</th>
        <th>Token For sale</th>
        <th>Presale Periode</th>
        <th>Crowdsale Periode</th>
        <th>List Exchange</th>
        <th>Rating</th>
      </tr>      
    </thead>
    
    
    <tbody>
		
		<?php 
			if ( $arr->count()==0  ) {
				echo "<tr><td colspan='11' align='center'>Data tidak ada</td></tr>";
			} else {
				//search by username

				foreach ($arr as $data_arr) {
		?>
				<tr class="row{{$data_arr->id}}">
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
				</tr>

		<?php 
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

