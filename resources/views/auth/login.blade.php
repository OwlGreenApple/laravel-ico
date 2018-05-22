@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
		
	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">

									<h1 class="panel-heading">Sign In</h1>

									<form class="form-horizontal" method="POST" action="{{ route('auth.login') }}">
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
											<div class="form-group">
													<label for="email" class="col-md-12 control-label">Email Address</label>

													<div class="col-md-12">
															<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

													</div>
											</div>

											<div class="form-group">
													<label for="password" class="col-md-12 control-label">Password</label>

													<div class="col-md-12">
															<input id="password" type="password" class="form-control" name="password" required>

													</div>
													<div class="col-md-12">
															<div class="checkbox">
																	<label>
																			<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span class="remember">Remember Me</span>
																	</label>
																<a class="btn btn-link" href="{{url('register')}}" style="float:right;margin-top:-10px;">
																		Register
																</a>
															</div>
															
													</div>
											</div>

											<div class="form-group">
													<div class="col-md-6 col-md-offset-4">
													</div>
											</div>

											<div class="form-group">
													<div class="col-md-6 col-md-offset-3">
															<button type="submit" class="btn btn-primary form-control">
																	Login
															</button>
															<a class="btn btn-link" href="{{url('forgot-password')}}">
																	Forgot Your Password?
															</a>
													</div>
											</div>
									</form>
					</div>
			</div>
	</div>


	
	
  <script>
    $(document).ready(function(){
      document.title = 'Login Icocheckr';

			$('#button-process').click(function(e){
			});
			
			
    });
  </script>		
	
@endsection

		
		
