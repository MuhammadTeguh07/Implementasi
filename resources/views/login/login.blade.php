<head>
	<title>Halaman Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('template/Login_v4/images/icons/favicon.ico') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/css/main.css') }}">
<!--===============================================================================================-->
	<meta name = "google-signin-client_id" content = "995030272870-kuls6dlmfr3m1nvj3fdgiv04rb1vmrb1.apps.googleusercontent.com">

</head>

<body>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('template/Login_v4/images/3.jpg') }}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="/dashboard" method="POST">
          			{{ csrf_field() }}
					<span class="login100-form-title p-b-49">
						Login
					</span>

					@if ($message = Session::get('daftar'))
				      <div class="alert alert-success alert-block">
					      <strong>{{ $message }}</strong>
				      </div>
				    @endif

					<div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100 has-val" type="email" name="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol=""></span>
					</div>
         	 		@if ($message = Session::get('femail'))
					  <strong style="margin-bottom:5px;font-family:inherit;color:#DC143C">{{ $message }}</strong>
				  	@endif

					<div class="wrap-input100 validate-input" data-validate="Password is required" style="margin-top:23px;margin-bottom:10px;">
						<span class="label-input100">Password</span>
						<input class="input100 has-val" type="password" name="pasword" placeholder="Type your password">
						<span class="focus-input100" data-symbol=""></span>
					</div>
          			@if ($message = Session::get('fpassword'))
					  <strong style="font-family:inherit;color:#DC143C;">{{ $message }}</strong>
				  	@endif

					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>
					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>
						<a href="/login/auth/google" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
					<div class="g-signin2" data-onsuccess="onSignIn" style="margin-left:140px; margin-top:20px;"></div>
					<div class="flex-col-c p-t-155">
						<a href="/signup" class="txt2">
							Sign Up
						</a>
					</div>
					<div>
						<a href="#" onclick="signOut();">Sign out</a>
					</div>
					<div id="result"></div>
				</form>
			</div>
		</div>
	</div>
		
	<script>
		function onSignIn(googleUser) {
  			var profile = googleUser.getBasicProfile();
  			document.getElementById('result').innerHTML = 
				profile.getId() + "<br>" +  // Do not send to your backend! Use an ID token instead.
  				profile.getName() + "<br>" +
				'<img src="'+profile.getImageUrl()+'"/>' + "<br>" +
				profile.getEmail(); // This is null if the 'email' scope is not present.
			// The ID token you need to pass to your backend:
			var id_token = googleUser.getAuthResponse().id_token;
        	console.log("ID Token: " + id_token);
		}
	</script>
	<script>
  		function signOut() {
    		var auth2 = gapi.auth2.getAuthInstance();
    		auth2.signOut().then(function () {
      			console.log('User signed out.');
				document.getElementById('result').innerHTML = '';
    		});
  		}
	</script>

	<!--===============================================================================================-->
		<script src="{{ asset('template/Login_v4/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('template/Login_v4/vendor/animsition/js/animsition.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('template/Login_v4/vendor/bootstrap/js/popper.js') }}"></script>
		<script src="{{ asset('template/Login_v4/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('template/Login_v4/vendor/select2/select2.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('template/Login_v4/vendor/daterangepicker/moment.min.js') }}"></script>
		<script src="{{ asset('template/Login_v4/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('template/Login_v4/vendor/countdowntime/countdowntime.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('template/Login_v4/js/main.js') }}"></script>
    <!-- Library Google Platform -->
    	<script src="https://apis.google.com/js/platform.js" async defer></script>
</body>