@extends('layouts.app')

@section('content')
	<script src="{{ asset('/js/datepicker.js') }}"></script>
	<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">
	
	<script>
		pageNow = 1;
	</script>
  <!-- Modal confirm delete -->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
					<div class="modal-content">
							<div class="modal-header">
									Delete 
							</div>
							<div class="modal-body">
									Are you sure want to delete ?
							</div>
							<input type="hidden" id="id-ico-delete">
							<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="button" data-dismiss="modal" class="btn btn-danger btn-ok" id="button-delete">Delete</button>
							</div>
					</div>
			</div>
	</div>	

	<div class="container">
		<div class="cover-input-group">
			<div class="input-group fl" style="margin-right:10px;" >
				<input type="text" placeholder="Order No" id="search-data" data-loading-text="Loading..." class="form-control" > 
			</div>  
			<div class="input-group fl">
				<input type="button" value="Search" id="button-search" data-loading-text="Loading..." class="btn btn-primary" style="margin-right:10px;" > 
			</div>  
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
        url: '<?php echo url('load-publish-admin'); ?>',
        type: 'get',
        data: {
          page: page,
					s : $("#search-data").val(),
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
			refresh_page(pageNow);
			
      $('.formatted-date').datepicker({
        // format: 'Y-m-d',
        format: 'm/d/Y',
        // format: 'Y-MM-DD HH:mm',
        // format: 'YYYY-MM-DD HH:mm',
      });
			
			$('#button-process').click(function(e){
        $.ajax({                                      
          url: '<?php echo url('save-ico-admin'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          data: $("#form-ico").serialize(),
          beforeSend: function()
          {
            $("#div-loading").show();
          },
          dataType: 'text',
          success: function(result)
          {
            var data = jQuery.parseJSON(result);
            $("#alert").show();
            $("#alert").html(data.message);
            if(data.type=='success') {
              refresh_page(pageNow);
              $("#alert").addClass("alert-success");
              $("#alert").removeClass("alert-danger");
            } else if (data.type=='error') {
              $("#alert").addClass("alert-danger");
              $("#alert").removeClass("alert-success");
            }
						$("#div-loading").hide();
          }
        });
			});

			$( "body" ).on( "click", ".btn-delete", function() {
				$("#id-ico-delete").val($(this).attr("data-id"));
			});
			$('#button-delete').click(function(e){
        $.ajax({                                      
          url: '<?php echo url('delete-ico-admin'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          data: {
						id : $("#id-ico-delete").val(),
					},
          beforeSend: function()
          {
            $("#div-loading").show();
          },
          dataType: 'text',
          success: function(result)
          {
            var data = jQuery.parseJSON(result);
            $("#alert").show();
            $("#alert").html(data.message);
            if(data.type=='success') {
              refresh_page(pageNow);
              $("#alert").addClass("alert-success");
              $("#alert").removeClass("alert-danger");
            } else if (data.type=='error') {
              $("#alert").addClass("alert-danger");
              $("#alert").removeClass("alert-success");
            }
						$("#div-loading").hide();
          }
        });
			});
			
			$('#button-search').click(function(e){
				refresh_page(1);
      });
			
      $( "body" ).on( "click", ".popup-newWindow", function() {
        event.preventDefault();
        window.open($(this).find("img").attr("src"), "popupWindow", "width=600,height=600,scrollbars=yes");
      });
    });
  </script>		
	
@endsection
