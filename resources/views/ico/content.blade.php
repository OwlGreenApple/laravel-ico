	<table class="table table-bordered" id="main-table">  
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
				<tr class="my-row{{$data_arr->id}}">
					<td class="col-xs-12 col-md-3">
							<div class="col-xs-3 col-md-4">
								<img src="{{asset('images/logo-ico').'/'.$data_arr->logo}}" class="img-responsive" style="height:50px;">
							</div>
							<div class="col-xs-9 col-md-8 detail-ico-info">
								<a href="{{ url('/ico').'/'.$data_arr->name }}" target="_blank"><h5>{{$data_arr->name}}</h5></a>
								<!--<a href=""><input type="button" value="View" class="btn btn-view"></a>-->
								<div class="details-ico-responsive">
									<p>
										<b>ICO Price : </b>
										{{$data_arr->price}}
										<br>
										<b>Token for sale : </b>
										{{$data_arr->price}}
										<br>
										<b>Presale Periode : </b>
										{{$data_arr->presale_start." - ".$data_arr->presale_end}}
										<br>
										<b>Crowdsale Periode : </b>
										{{$data_arr->sale_start." - ".$data_arr->sale_end}}
										<br>
										<b>List Exchange : </b>
										{{$data_arr->price}}
										<br>
										<b>Rating: </b>
										{{$data_arr->rating}}
									</p>
								</div>
							</div>
					</td>
					<td class="remove-hp">
						{{$data_arr->price}}
					</td>
					<td class="remove-hp">
						{{$data_arr->price}}
					</td>
					<td class="remove-hp">
						<?php 
							echo $data_arr->presale_start." <br> - <br>".$data_arr->presale_end;
						?>
					</td>
					<td class="remove-hp">
						<?php 
							echo $data_arr->sale_start." <br> - <br>".$data_arr->sale_end;
						?>
					</td>
					<td class="remove-hp">
						{{$data_arr->price}}
					</td>
					<td class="remove-hp">
						{{$data_arr->rating}}
					</td>
				</tr>

		<?php 
				}
			}
		?>
    </tbody>
  </table>  
	

	<nav>
		<ul class="pagination fr" id="pagination">
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

