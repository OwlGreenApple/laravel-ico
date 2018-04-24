@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h1 class="panel-heading">Confirm Payment</h1>

										<form class="form-horizontal" enctype="multipart/form-data" id="form-confirm">
                        {{ csrf_field() }}

												<div class="alert" id="alert" style="display:none;">
												</div>
                        <div class="form-group">
                            <label for="no_order" class="col-md-12 control-label">Order No</label>

                            <div class="col-md-12">
                                <input id="no_order" type="text" class="form-control" name="no_order" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="col-md-12 control-label">Screenshoot TX page</label>

                            <div class="col-md-12">
															<input type="file" class="form-control" placeholder="" id="photo" name="photo">
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="description" class="col-md-12 control-label">Description</label>

                            <div class="col-md-12">
															<textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>-->

												<div class="form-group">
														<div class="col-md-6 col-md-offset-4">
														</div>
												</div>
											
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="button" id="button-process" class="btn btn-primary form-control" value="Process">
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>


<script>
  function cek_form() {
    var flag=true;
    error_message="";
		if($('#no_order').val()=="") {
			error_message+="Order No Cant be empty <br>";
			flag=false;
		}
		if($('#photo').val()=="") {
			error_message+="Please screenshoot your transaction hash page<br>";
			flag=false;
		}else{
		}
		var ext = $('#photo').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			error_message+="Extension file only can be gif, png, jpg, jpeg <br>";
			flag=false;
		}else{
		}				
        
    if (flag==false) {
      $("#alert").addClass('alert-danger');
      $("#alert").removeClass('alert-success');
      $("#alert").show();
      $("#alert").html(error_message);
    }
    return flag;
  }  
	$(document).ready(function(){
    $('#button-process').click(function(e){
      var uf = $('#form-confirm');
      var fd = new FormData(uf[0]);
      if (cek_form()==true) {
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          url: "<?php echo url('submit-confirm-payment'); ?>",
          data: fd,
          processData:false,
          contentType: false,
          dataType: 'text',
          beforeSend: function()
          {
            $("#div-loading").show();
          },
          success: function(result) {
              // $('#result').html(data);
              $("#div-loading").hide();
              var data = jQuery.parseJSON(result);
              $("#alert").show();
              $("#alert").html(data.message);
              if(data.type=='success')
              {
								$("#alert").html("Thank you for confirming. <br><br> We will send you an email for your further payment status.<br><br>It will take up to 3 days for this process.");
                $("#alert").addClass('alert-success');
                $("#alert").removeClass('alert-danger');
              }
              else if(data.type=='error')
              {
                $("#alert").addClass('alert-danger');
                $("#alert").removeClass('alert-success');
              }
          }
      });
      }
    });
		
	});       
</script>
@endsection
