@extends('layouts.app')

@section('content')
	<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
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

            <!--<div class="form-group form-group-sm row">
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
            </div>-->

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
								<!--<input type="text" class="form-control" id="status" name="status">-->
								<select class="form-control" id="status" name="status">
									<option value="upcoming">Upcoming</option>
									<option value="ongoing">Ongoing(presale,private, or public sale)</option>
									<option value="onexchange">Onexchange</option>
								</select>
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

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Platform</label>
              <div class="col-xs-12 col-md-9">
								<!--<input type="text" class="form-control" id="platform" name="platform">-->
								<select class="form-control" id="platform" name="platform">
									<option value="ethereum">Ethereum</option>
									<option value="stellar">Stellar</option>
									<option value="neo">Neo</option>
									<option value="waves">Waves</option>
									<option value="etc">etc</option>
								</select>
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Country Operation</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="country-operation" name="country_operation">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Restrictions</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="restrictions" name="restrictions">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Token Ticker</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="token-ticker" name="token_ticker">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Presale start</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control formatted-date" id="presale-start" name="presale_start">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Presale end</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control formatted-date" id="presale-end" name="presale_end">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Sale start</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control formatted-date" id="sale-start" name="sale_start">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Sale end</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control formatted-date" id="sale-end" name="sale_end">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">List Exchange</label>
              <div class="col-xs-12 col-md-9">
								<textarea name="list_exchange" id="list-exchange"></textarea>
								<script>
									var selectListExchange = $('#list-exchange').selectize({
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
									
									var selectizeListExchange = selectListExchange[0].selectize;

								</script>
								
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

  <!-- Modal -->
  <div class="modal fade" id="myModalAbout" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-about-header">ICO</h4>
        </div>
        <div class="modal-body">
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-12 control-label" for="formGroupInputSmall">About</label>
              <div class="col-xs-12 col-md-12">
								<textarea class="form-control" rows="3" name="about" id="about"></textarea>
              </div>
            </div>

            <input type="hidden" id="id-ico-about">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="button-process-about">Submit</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModalDescription" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-description-header">ICO</h4>
        </div>
        <div class="modal-body">
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-12 control-label" for="formGroupInputSmall">Description</label>
              <div class="col-xs-12 col-md-12">
								<textarea class="form-control" rows="3" name="description" id="description"></textarea>
              </div>
            </div>

            <input type="hidden" id="id-ico-description">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="button-process-description">Submit</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModalIconLink" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-description-header">Icon Link</h4>
        </div>
        <div class="modal-body">
					<form enctype="multipart/form-data" id="form-ico-icon">
            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Twitter Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="twitter-link" name="twitter_link">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Facebook Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="facebook-link" name="facebook_link">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Github Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="github-link" name="github_link">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Reddit Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="reddit-link" name="reddit_link">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Bitcointalk Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="bitcointalk-link" name="bitcointalk_link">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Medium Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="medium-link" name="medium_link">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Telegram Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="telegram-link" name="telegram_link">
              </div>
            </div>

            <div class="form-group form-group-sm row">
              <label class="col-xs-12 col-md-3 control-label" for="formGroupInputSmall">Website Link</label>
              <div class="col-xs-12 col-md-9">
								<input type="text" class="form-control" id="website-link" name="website_link">
              </div>
            </div>

            <input type="hidden" id="id-ico-icon">
					</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="button-process-icon">Submit</button>
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
		function add_option_categories(){
			selectizeCategories.addOption({value:"Platform",text:"Platform"});
			selectizeCategories.addOption({value:"Cryptocurrency",text:"Cryptocurrency"});
			selectizeCategories.addOption({value:"Business services",text:"Business services"});
			selectizeCategories.addOption({value:"Investment",text:"Investment"});
			selectizeCategories.addOption({value:"Software",text:"Software"});
			selectizeCategories.addOption({value:"Entertainment",text:"Entertainment"});
			selectizeCategories.addOption({value:"Internet",text:"Internet"});
			selectizeCategories.addOption({value:"Banking",text:"Banking"});
			selectizeCategories.addOption({value:"Infrastructure",text:"Infrastructure"});
			selectizeCategories.addOption({value:"Smart Contract",text:"Smart Contract"});
			selectizeCategories.addOption({value:"Communication",text:"Communication"});
			selectizeCategories.addOption({value:"Media",text:"Media"});
			selectizeCategories.addOption({value:"Retail",text:"Retail"});
			selectizeCategories.addOption({value:"Health",text:"Health"});
			selectizeCategories.addOption({value:"Big Data",text:"Big Data"});
			selectizeCategories.addOption({value:"Real estate",text:"Real estate"});
			selectizeCategories.addOption({value:"Casino or Gambling",text:"Casino or Gambling"});
			selectizeCategories.addOption({value:"AI",text:"AI"});
			selectizeCategories.addOption({value:"Tourism",text:"Tourism"});
			selectizeCategories.addOption({value:"Education",text:"Education"});
			selectizeCategories.addOption({value:"Manufacturing",text:"Manufacturing"});
			selectizeCategories.addOption({value:"Sports",text:"Sports"});
			selectizeCategories.addOption({value:"Energy",text:"Energy"});
			selectizeCategories.addOption({value:"VR or AR",text:"VR or AR"});
			selectizeCategories.addOption({value:"Charity",text:"Charity"});
			selectizeCategories.addOption({value:"Legal",text:"Legal"});
			selectizeCategories.addOption({value:"Art",text:"Art"});
			selectizeCategories.addOption({value:"Other",text:"Other"});
		}
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
			
			CKEDITOR.replace( 'about' );
			CKEDITOR.replace( 'description' );
				
      $('.formatted-date').datepicker({
        format: 'Y-m-d',
        // format: 'Y-MM-DD HH:mm',
        // format: 'YYYY-MM-DD HH:mm',
      });
			
			$('#button-add').click(function(e){
				$("#id-ico").val("new");
				$("#ico-name").val("");
				$("#rating").val("");
				// $("#about").html("");
				// $("#description").html("");
				selectizeCategories.clearOptions();
				add_option_categories();
				$("#status").val("");
				$("#url-link-video").val("");
				$("#url-link-blog").val("");
				$("#ofc-website").val("");
				$("#price").val("");
				$("#platform").val("");
				$("#country-operation").val("");
				$("#restrictions").val("");
				$("#token-ticker").val("");
				$("#presale-start").val("");
				$("#presale-end").val("");
				$("#sale-start").val("");
				$("#sale-end").val("");
				selectizeListExchange.clearOptions();
			});
      $( "body" ).on( "click", ".btn-update", function() {
				$("#id-ico").val($(this).attr("data-id"));
				$("#ico-name").val($(this).attr("data-name"));
				$("#rating").val($(this).attr("data-rating"));
				// $("#about").html($(this).attr("data-about"));
				// $("#description").html($(this).attr("data-description"));

				selectizeCategories.clearOptions();
				add_option_categories();
				var numbersString = $(this).attr("data-categories");
				var numbersArray = numbersString.split(';');				
				
				// console.log(numbersArray);
				
				var i;
				for (i = 0; i < numbersArray.length; ++i) {
					// do something with `numbersArray[i]`
					// selectizeCategories.addOption({value:numbersArray[i],text:numbersArray[i]});
					selectizeCategories.addItem(numbersArray[i]);
				}
				

				$("#status").val($(this).attr("data-status"));
				$("#url-link-video").val($(this).attr("data-url_link_video"));
				$("#url-link-blog").val($(this).attr("data-url_link_blog"));
				$("#ofc-website").val($(this).attr("data-ofc_website"));
				$("#price").val($(this).attr("data-price"));
				
				$("#platform").val($(this).attr("data-platform"));
				$("#country-operation").val($(this).attr("data-country_operation"));
				$("#restrictions").val($(this).attr("data-restrictions"));
				$("#token-ticker").val($(this).attr("data-token_ticker"));
				$("#presale-start").val($(this).attr("data-presale_start"));
				$("#presale-end").val($(this).attr("data-presale_end"));
				$("#sale-start").val($(this).attr("data-sale_start"));
				$("#sale-end").val($(this).attr("data-sale_end"));
				selectizeListExchange.clearOptions();
				var numbersString = $(this).attr("data-list_exchange");
				var numbersArray = numbersString.split(';');				
				
				// console.log(numbersArray);
				
				var i;
				for (i = 0; i < numbersArray.length; ++i) {
					// do something with `numbersArray[i]`
					selectizeListExchange.addOption({value:numbersArray[i],text:numbersArray[i]});
					selectizeListExchange.addItem(numbersArray[i]);
				}
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
			$( "body" ).on( "click", ".btn-update-about", function() {
				// $("#about").html($(this).attr("data-about"));
				$("#id-ico-about").val($(this).attr("data-id"));
				CKEDITOR.instances.about.setData($(this).attr("data-about"));
			});
			$('#button-process-about').click(function(e){
        $.ajax({
          url: '<?php echo url('save-ico-about'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          data: {
						id : $("#id-ico-about").val(),
						about : CKEDITOR.instances.about.getData(),
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
			$( "body" ).on( "click", ".btn-update-description", function() {
				// $("#description").html($(this).attr("data-description"));
				$("#id-ico-description").val($(this).attr("data-id"));
				CKEDITOR.instances.description.setData($(this).attr("data-description"));
			});
			$('#button-process-description').click(function(e){
        $.ajax({                                      
          url: '<?php echo url('save-ico-description'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          data: {
						id : $("#id-ico-description").val(),
						description : CKEDITOR.instances.description.getData(),
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

			$( "body" ).on( "click", ".btn-update-icon", function() {
				// $("#description").html($(this).attr("data-description"));
				$("#id-ico-icon").val($(this).attr("data-id"));
			});
			$('#button-process-icon').click(function(e){
        $.ajax({                                      
          url: '<?php echo url('save-ico-icon'); ?>',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
					data: $("#form-ico-icon").serialize(),
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
