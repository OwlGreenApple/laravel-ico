@extends('layouts.app')

@section('content')
	<script src="{{ asset('/js/datepicker.js') }}"></script>
	<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">
	
	<script>
		pageNow = 1;
	</script>
	
  <!-- Modal -->
  <div class="modal fade" id="myModalIco" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Data Application Submit</h4>
        </div>
        <div class="modal-body">
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">ICO Name</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="ico-name"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Package</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="type-application"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Categories</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="categories"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Website</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="website"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">About</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="about"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Description</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="description"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Sale Date</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="sale-date"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Token Ticker</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="token-ticker"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Link Whitepaper</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="link-whitepaper"></span>
							</div>
						</div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Link Bounty</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="link-bounty"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Platform</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="platform"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Price</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="price"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Restrictions</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="restrictions"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Contact Email</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="contact-email"></span>
							</div>
						</div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Status</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="status"></span>
							</div>
						</div>
						
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">User Email</label>
              <div class="col-xs-12 col-md-9">
								<span class="" id="user-email"></span>
							</div>
						</div>
						
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
	
	<div class="container">
		<div class="cover-input-group">
			<div class="input-group fl" style="margin-right:10px;" >
				<input type="text" placeholder="ICO name" id="search-data" data-loading-text="Loading..." class="form-control" > 
			</div>  
			<div class="input-group fl">
				<input type="button" value="Search" id="button-search" data-loading-text="Loading..." class="btn btn-primary" style="margin-right:10px;" > 
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
			
			
			$('#button-search').click(function(e){
				refresh_page(1);
      });
			
			$( "body" ).on( "click", ".btn-show", function() {
				$("#ico-name").html($(this).attr("data-ico_name"));
				$("#type-application").html($(this).attr("data-type_application"));
				$("#categories").html($(this).attr("data-categories"));
				$("#website").html($(this).attr("data-ofc_website"));
				$("#about").html($(this).attr("data-about"));
				$("#description").html($(this).attr("data-description"));
				$("#sale-date").html($(this).attr("data-sale_date"));
				$("#token-ticker").html($(this).attr("data-token_ticker"));
				$("#link-whitepaper").html($(this).attr("data-link_whitepaper"));
				$("#link-bounty").html($(this).attr("data-link_bounty"));
				$("#platform").html($(this).attr("data-platform"));
				$("#price").html($(this).attr("data-price"));
				$("#restrictions").html($(this).attr("data-restrictions"));
				$("#contact-email").html($(this).attr("data-contact_email"));
				$("#status").html($(this).attr("data-status"));
				$("#user-email").html($(this).attr("data-user-email"));
      });
			
			$( "body" ).on( "click", ".btn-confirm", function() {
        $.ajax({                                      
          url: '<?php echo url('submit-publish-ico-admin'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          data: {
						id : $(this).attr("data-id"),
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
			
    });
  </script>		
	
@endsection
