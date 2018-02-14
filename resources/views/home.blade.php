@extends('layouts.app')

@section('content')

<div class="background-banner">
	<div class="container">
		<h1>
			Check ICO BETTER with <br>
			ICOCHECKR
		</h1>
		<p>
			Get the Latest update of ICO Ratings <br>
			from Expert
		</p>
		<button>
			Check ICO
		</button>
	</div>
</div>



<div class="container">
    <div class="row">
		<!--
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

										@guest
										@else
											You are logged in!
										@endguest
                </div>
            </div>
        </div>
		-->
    </div>
</div>
@endsection
