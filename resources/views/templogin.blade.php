


@extends('layouts.skeleton')

@section('assets')
	<link rel="stylesheet" href="{{URL::asset('css/loginStyle.css')}}">
@endsection

@section('title', 'COMPLIANCE CENTER DASHBOARD')

@section('content')

	<div class="content">
		<div class="list-group responsive">

			<h1 class="SignTitle">Sign in</h1>

			<form action="#" method="POST" class="form-horizontal" role="form">
				{{ CSRF_field() }}

				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon loginItem"><i class="glyphicon glyphicon-user"></i></span>
					<input id="login-username" type="text" class="form-control loginItem" name="username" placeholder="username" value="{{ old('username') }}" required>
				</div>

				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon loginItem"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="login-password" type="password" class="form-control loginItem" name="password" placeholder="password" required value="{{ old('password') }}">
					<a class="input-group-addon loginItem passwordPreview" onclick="showPassword();" onmouseout="mouseoutPass();"><i class="glyphicon glyphicon-eye-open"></i></a>
				</div>

				@include('flash::message')

				<button type="submit" class="btn btn-lg loginbutton">Log In</button>
			</form>
		</div><!-- end of content div -->
	</div>


<script type="text/javascript">

function showPassword(obj) {
  var obj = document.getElementById('login-password');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('login-password');
  obj.type = "password";
}




</script>

@endsection