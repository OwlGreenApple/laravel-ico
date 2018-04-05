@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h1 class="panel-heading">Register</h1>

                    <form class="form-horizontal" method="POST" action="{{ route('auth.register') }}">
                        {{ csrf_field() }}

												<div class="form-group">
													@if (session('error') )
														<div class="alert alert-danger">
															<p align="center">{{session('error')}}</p>
														</div>
													@endif
													@if (session('success') )
														<div class="alert alert-success">
															<p align="center">{{session('success')}}</p>
														</div>
													@endif
												</div>
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-12 control-label">Fullname</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

												<div class="form-group">
														<div class="col-md-6 col-md-offset-4">
														</div>
												</div>
											
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary form-control">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>


<script>
	$(document).ready(function(){
		$('form').submit(function(e) {
			flag= false;
			message = "";
			if ($("#password").val()!=$("#password-confirm").val()) {
				message += "password anda tidak sama dengan password confirmation";
				flag= true;
			} 
			if ($("#password").val().length<6) {
				message += "password min 6 char";
				flag= true;
			}

			if (flag){
				e.preventDefault();
				alert(message);
			} else {
				$(this).find("button[type='submit']").prop('disabled',true);
			}
		});      
	});       
</script>
@endsection
