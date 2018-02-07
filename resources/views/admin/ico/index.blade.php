@extends('layouts.app')

@section('content')
  <!-- Modal -->
  <div class="modal fade" id="myModalIco" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ICO</h4>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" id="form-ico">
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">ICO Name</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="ico-name" name="name">
							</div>
						</div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Rating</label>
              <div class="col-xs-12 col-md-9">
								<input type="number" class="form-control" id="rating" name="rating">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">About</label>
              <div class="col-xs-12 col-md-9">
								<textarea class="form-control" rows="3" name="about" id="about"></textarea>
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Description</label>
              <div class="col-xs-12 col-md-9">
								<textarea class="form-control" rows="3" name="description" id="description"></textarea>
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Categories</label>
              <div class="col-xs-12 col-md-9">
								<textarea name="categories" id="categories"></textarea>
								<script>
									var selectCategories = $('#categories').selectize({
										plugins:['remove_button'],
										delimiter: ';',
										persist: false,
										create: function(input) {
											return {
												value: input,
												text: input
											}
										},
									});
									
									/*var selectCategories = $('#categories').selectize({
											onChange: function (value) {

											}
									});*/
									var selectizeCategories = selectCategories[0].selectize;

								</script>
								
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Status</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="status" name="status">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">URL Video</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="url-link-video" name="url_link_video">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">URL Blog</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="url-link-blog" name="url_link_blog">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Website</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="ofc-website" name="ofc_website">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Price</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="price" name="price">
              </div>
            </div>

            <input type="hidden" name="idIco" id="id-ico">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="button-process">Submit</button>
        </div>
      </div>
      
    </div>
  </div>

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


  <div class="cover-input-group">
    <div class="input-group fl">
      <input type="button" value="Add" id="button-add" data-loading-text="Loading..." class="btn btn-primary" style="margin-right:10px;" data-toggle="modal" data-target="#myModalIco"> 
    </div>  
	</div>  
  <div class="alert alert-danger" id="alert" style="display:none;">
  </div>  
	<div class="" id="content">  
	</div>  
	
  <script>
    function refresh_page(page)
    {
      $.ajax({
        url: '<?php echo url('load-ico-admin'); ?>',
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
			
			$('#button-add').click(function(e){
				$("#id-ico").val("new");
				$("#ico-name").val("");
				$("#rating").val("");
				$("#about").html("");
				$("#description").html("");
				selectizeCategories.clearOptions();
				$("#status").val("");
				$("#url-link-video").val("");
				$("#url-link-blog").val("");
				$("#ofc-website").val("");
				$("#price").val("");
			});
      $( "body" ).on( "click", ".btn-update", function() {
				$("#id-ico").val($(this).attr("data-id"));
				$("#ico-name").val($(this).attr("data-name"));
				$("#rating").val($(this).attr("data-rating"));
				$("#about").html($(this).attr("data-about"));
				$("#description").html($(this).attr("data-description"));

				selectizeCategories.clearOptions();
				var numbersString = $(this).attr("data-categories");
				var numbersArray = numbersString.split(';');				
				
				// console.log(numbersArray);
				
				var i;
				for (i = 0; i < numbersArray.length; ++i) {
					// do something with `numbersArray[i]`
					selectizeCategories.addOption({value:numbersArray[i],text:numbersArray[i]});
					selectizeCategories.addItem(numbersArray[i]);
				}
				

				$("#status").val($(this).attr("data-status"));
				$("#url-link-video").val($(this).attr("data-url_link_video"));
				$("#url-link-blog").val($(this).attr("data-url_link_blog"));
				$("#ofc-website").val($(this).attr("data-ofc_website"));
				$("#price").val($(this).attr("data-price"));
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
              refresh_page(1);
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
              refresh_page(1);
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
