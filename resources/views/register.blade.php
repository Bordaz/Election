<!doctype html>
<html lang="en">
  <head>
  	<title>Election System Registration page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="sign_up/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mt-0 mb-0 ">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap">
		      	<div class="img" style="background-image: url(sign_up/images/bg.jpg);"></div>
		      	<h3 class="text-center mb-4">Sign Up</h3>
						<form method="POST" action="{{ route('user.reg') }}" class="signup-form">
							@if(Session::has('success'))
							<div class="alert alert-success"> {{Session::get('success')}} </div>
							@endif
							@if(Session::has('fail'))
							<div class="alert alert-danger"> {{Session::get('fail')}} </div>
							@endif
							@csrf
					<div class="form-group mb-3">
						<input type="text" name="f_name" class="form-control" placeholder="Your Fullname here" value="{{ old('f_name') }}">
						<span style="color:red;"> @error('f_name') {{$message}} @enderror</span>
					</div>
		      		<div class="form-group mb-3">
		      			<input type="text" name="matric" class="form-control" placeholder="Matric Number Here" value="{{ old('matric') }}">
						 <span style="color:red;"> @error('matric') {{$message}} @enderror</span>
		      		</div>
		      		<div class="form-group mb-3">
		      			<input type="password" name="password" class="form-control" placeholder="Password">
						 <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						 <span style="color:red;"> @error('password') {{$message}} @enderror</span>

		      		</div>
	            <div class="form-group mb-3">
	              <input type="text" class="form-control" name="nacoss_transac_id" placeholder="Your Nacoss Fee Transaction Id ">
			    <span  style="color:red;"> @error('nacoss_transac_id') {{ 'Nacoss fee Transaction id is required '}} @enderror</span>
	            </div>
			  <div class="form-group mb-3">
				<select name="level" class="form-select form-select-md form-control" >
					<option selected> Select your Level </option>
					<option value="ND1"> ND1 </option>
					<option value="ND2"> ND2</option>
					<option value="HND1"> HND1</option>
					<option value="HND2"> HND2</option>
				</select>
				<span style="color:red;"> @error('level') {{$message}} @enderror</span>
			   </div>
			   <div class="form-group mb-3">
				<select name="program" class="form-select form-select-md form-control" >
					<option selected> Select your Program </option>
					<option value="DPP"> DPP </option>
					<option value="FT"> FT</option>
					<option value="PT"> PT </option>
				</select>
				<span style="color:red;"> @error('program') {{$message}} @enderror</span>
			   </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
	            </div>
			  
	          </form>
	          <p>I'm already a member! <a href="{{ route('login') }}">Sign In</a></p>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="sign_up/js/jquery.min.js"></script>
  <script src="sign_up/js/popper.js"></script>
  <script src="sign_up/js/bootstrap.min.js"></script>
  <script src="sign_up/js/main.js"></script>

	</body>
</html>

