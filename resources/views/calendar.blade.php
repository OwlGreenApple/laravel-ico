@extends('layouts.app')

@section('content')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
<script src="{{ asset('/js/datepicker.js') }}"></script>
<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">

<script type="text/javascript">
  var start='';
  var end='';

  $(document).ready(function() {
    $('.formatted-date').datepicker({
      format: 'Y-m-d',
    });
    load_ico();
  });

  function load_ico(page=1){
    $.ajax({
      url: '<?php echo url('load-ico-calendar'); ?>',
      type: 'get',
      data: {
        start:start, 
        end:end,
        page:page
      },
      beforeSend: function()
      {
        $("#div-loading").show();
      },
      dataType: 'text',
      success: function(result)
      {
        $('#div-ico-calendar').html(result);
        $("#div-loading").hide();    
      }
    });
  }

  $('body').on('click','.btn-search', function() {
    start = $('#start').val();
    end = $('#end').val();
    load_ico()
  });
</script>
<div class="container">
  <div class="search-bar row">
      <div class="row">
        <div class="col-xs-12 col-md-3">
          <label class="control-label">Start</label>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-3">
          <input type="text" class="form-control formatted-date" id="start" autocomplete="off">
        </div>
        <div class="col-xs-12 col-md-1" align="center">
          <p>s/d</p>  
        </div>
        <div class="col-xs-12 col-md-3">
          <input type="text" class="form-control formatted-date" id="end" autocomplete="off">
        </div>
        <div class="col-xs-12 col-md-3">
          <button type="button" class="btn btn-primary btn-search">Search</button>
        </div>
      </div>
  </div>
</div>

<div class="container" style="margin-top: 50px; margin-bottom: 100px;">
  <div id="div-ico-calendar">
  </div>
</div>
@endsection