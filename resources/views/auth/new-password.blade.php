@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
		
	<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">

						<h1 class="panel-heading">Forgot Password</h1>


						<form class="form-signin" method="POST" action="{{ route('change.password') }}">
							{!! csrf_field() !!}
								<label>Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{Input::old('password')}}">
								<label>Confirmation Password </label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter confirmation password" value="{{Input::old('password')}}">
							
							<button class="btn btn-lg btn-block" type="submit">Submit</button>
						</form>

					</div>
			</div>
	</div>

      <script>
        $(document).ready(function(){
					document.title = 'Forgot Password Icocheckr';
          $('form').submit(function(e) {
            flag= false;
            message = "";
            if ($("#password").val()!=$("#password_confirmation").val()) {
              message += "password anda tidak sama dengan confirmation password";
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
