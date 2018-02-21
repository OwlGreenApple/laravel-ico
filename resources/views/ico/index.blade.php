@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="cover-input-group">
			<div class="input-group fl">
				<input type="button" value="Add" id="button-add" data-loading-text="Loading..." class="btn btn-primary" style="margin-right:10px;" data-toggle="modal" data-target="#myModalIco"> 
			</div>  
		</div>  
		<div class="alert alert-danger" id="alert" style="display:none;">
		</div>  
		<div class="" id="content">  
		</div>  
	</div>  
	
  <script>
    function refresh_page(page)
    {
      $.ajax({
        url: '<?php echo url('load-ico'); ?>',
        type: 'get',
        data: {
          page: page,
					// filename: $("#file-name").val(),
        },
        beforeSend: function()
        {
          $("#div-loading").show();
        },
        dataType: 'text',
        success: function(result)
        {
          $('#content').html(result);
          $("#div-loading").hide();
        }
      });
    }
    $(document).ready(function(){
      $("#alert").hide();
      document.title = 'ICO - Content';
			refresh_page(1);
			
			
			
    });
  </script>		
	
@endsection
