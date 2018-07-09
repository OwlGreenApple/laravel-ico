<?php 
  if ( $arr->count()==0  ) {
    echo "<tr><td colspan='11' align='center'>Data tidak ada</td></tr>";
  } else {
    foreach ($arr as $ico) {
?>
      <div class="col-xs-12 col-md-3 ico-list" align="center">
        <h3>{{$ico->name}}</h3>
        <div class="banner-ico">
          <img src="{{asset('images/logo-ico').'/'.$ico->logo}}" class="ico-logo">
        </div>
        <p>
          Presale : {{date('d-m-Y', strtotime($ico->presale_start))}}
        </p>
        <p>Sale : {{date('d-m-Y', strtotime($ico->sale_start))}}</p>
      </div>
<?php 
    }
  }
?>
<div class="row" style="clear: both; margin-right: 1px;">
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
</div>

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
    load_ico(page);
  });

  $(document).ready(function(){
  });

</script>