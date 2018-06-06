@extends('layouts.app')

@section('content')
<script src="{{ asset('/js/datepicker.js') }}"></script>
<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">

<div class="container">
  <div class="search-bar row">
    <div class="row">
      <div class="col-xs-12 col-md-3">
        <label class="control-label">Start</label>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-3">
        <input type="text" class="form-control formatted-date" id="start-date">
      </div>
      <div>
        <p>-</p>
      </div>
      <div class="col-xs-12 col-md-3">
        <input type="text" class="form-control formatted-date" id="end-date">
      </div>
      <div class="col-xs-12 col-md-3">
        <button class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
</div>
@endsection