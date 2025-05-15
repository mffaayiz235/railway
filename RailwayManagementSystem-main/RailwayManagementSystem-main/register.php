<?php
include("server.php");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Registration page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {
		  background-image: url('https://www.irctc.co.in/nget/swach_banner2.391192cab480269195cd.jpg');
		  background-repeat: no-repeat;
		  background-size: cover;

		}
	</style>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarText">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="index.php">Book Tickets<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="train_stas.php">Train Status</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="pnr.php">PNR Enquiry</a>
			      </li>
			    </ul>
			    <span class="navbar-text" class="nav-item">
			      <a class="nav-link" href="login.php">Login</a>
			    </span>
			  </div>
			</nav>
	<div class="header" style="background: linear-gradient(to right, #007bff, #00a5ff">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">
	
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label><b>Username</b></label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label><b>Email</b></label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<label><b>Password</b></label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label><b>Confirm password</b></label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn" style="color: white; background: linear-gradient(to right, #007bff, #00a5ff);"><b>Register</b></button>
		</div>
		<p>
			Already a member?<a href="login.php"><b>Sign in</b></a>
		</p>
		<br><br>
	</form>
		<?php include('footer.php'); ?>

</body>
</html>