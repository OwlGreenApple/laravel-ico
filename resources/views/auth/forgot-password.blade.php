@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
		
	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">

									<h1 class="panel-heading">Forgot Password</h1>

									<form class="form-horizontal" method="POST" action="{{ route('auth.login') }}">
											{{ csrf_field() }}

											<div class="form-group">
												@if (session('success') )
													<div class="alert alert-success">
														Please check your email inbox.
													</div>
												@endif
												@if (session('error') )
													<div class="alert alert-danger">
														Email not registered.
													</div>
												@endif
											</div>
											<div class="form-group">
													<label for="email" class="col-md-12 control-label">Email</label>

													<div class="col-md-12">
															<input type="email" class="form-control" id="username" name="username" placeholder="Please input your email to RESET PASSWORD" value="{{Input::old('username')}}" required autofocus>


													</div>
											</div>

											<div class="form-group">
													<div class="col-md-6 col-md-offset-4">
													</div>
											</div>

											<div class="form-group">
													<div class="col-md-6 col-md-offset-3">
															<button type="submit" class="btn btn-primary form-control">
																	Submit
															</button>

															<a class="btn btn-link" href="{{url('/login')}}">
																	Back to login 
															</a>
													</div>
											</div>
									</form>
					</div>
			</div>
	</div>







  <script>
    $(document).ready(function(){
      document.title = 'Forgot Password Icocheckr';

			$('#button-process').click(function(e){
			});
			
			
    });
  </script>		
	
@endsection
