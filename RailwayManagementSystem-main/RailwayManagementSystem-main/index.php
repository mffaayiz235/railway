<?php
include("server.php");
?>
<?php
include("server2.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Book tickets</title>
	<style>
	
	

	#profile{
		float:top;
		font-family: sans-serif;
		text-align: center;
		max-width: 350px;
		height:	500px;
		margin-left: 150px;
		margin-top: 50px;
		padding: 6px;
		background: white;
	}

	#profile img{

		width: 150px;
		height: 150px;
		border-radius: 50%;
		object-fit: cover;
	}
	h2{
		text-align: : center;
		font-size: 52px;
		font-weight: bold;
		margin-top: 20px;
		margin-bottom: 0px;
		padding-top: 0;
		text-transform: capitalize;
	}
	i{
		margin: auto;
		vertical-align: middle;
	}
	h4{
		margin-top: 0px;
		margin-bottom: 10px;
	}
	.uh{
		width: 80%;
		padding: 5px;
		font-size: 15px;
		margin: 0px auto;

	}
	.material-icons{
		height: 34px;
		width: 39px;
	}
	.k2th{
		margin-top: 5px ;
		border: none;
		color: blue;
		background-color: white;
		cursor: pointer;
		display: inline-block;
		width: 50px;
		border-color: white;
	}
	.hjk{
		margin-top: 26px;
		font-size: 18px;
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
			  <?php if(isset($_SESSION['username'])): ?>	
				  <div class="collapse navbar-collapse" id="navbarText">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
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
    Welcome <strong><?php echo $_SESSION['username']; ?></strong>
</span>
<span class="navbar-text" class="nav-item" style="margin-left: 10px;">
<a class="nav-link" href="index.php?logout='1'" style="color: white; background: linear-gradient(to right, #007bff, #00a5ff); margin:10px;padding: 10px; border: none; border-radius: 10px;">Logout</a>
</span>

				<?php endif ?>
				<?php if(!isset($_SESSION['username'])): ?>
					<div class="collapse navbar-collapse" id="navbarText">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="login.php">Book Tickets<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="train_stas.php">Train Status</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="pnr.php">PNR Enquiry</a>
				      </li>
				    </ul>	
				    <span class="navbar-text" class="nav-item">
				      <a class="nav-link" href="register.php">Register</a>
				    </span>
				    <span class="navbar-text" class="nav-item">
				      <a class="nav-link" href="login.php">Login</a>
				    </span>
				<?php endif ?>
			  </div>
			</nav>
			<form method="post" action="confirm.php">
			<aside id="profile" style="text-align: center; margin: 80px auto;  height: 500px;">
    <h2 style="color:#007bff;">BOOK</h2>
    <h4 >YOUR TICKET</h4>
    <span class="material-icons">directions_transit</span><br>
    <select name="from" class="uh" required>
      <option value="">From*</option>
      <?php
        $db=mysqli_connect('localhost','root','pass123','registration');
        $q = "SELECT DISTINCT Source_Station_Name FROM train_info order by Source_Station_Name";
        $r=mysqli_query($db,$q);
        while ($row = mysqli_fetch_assoc($r)) {
          $source = $row['Source_Station_Name'];
          echo "<option value='$source'";
          if (isset($from) && $from==$source) {
            echo " selected";
          }
          echo ">$source</option>";
        }
      ?>
    </select><br><br>
    <select name="to" class="uh" required>
      <option value="">To*</option>
      <?php
        $q = "SELECT DISTINCT Destination_Station_Name FROM train_info order by Destination_Station_Name";
        $r=mysqli_query($db,$q);
        while ($row = mysqli_fetch_assoc($r)) {
          $destination = $row['Destination_Station_Name'];
          echo "<option value='$destination'";
          if (isset($to) && $to==$destination) {
            echo " selected";
          }
          echo ">$destination</option>";
        }
      ?>
    </select><br>
    <div class="hjk"><input type="date" name="date" id="datePicker" placeholder="yyyy-mm-dd" class="uh" value="2019-11-27"required><div>
    <select name="classes" class="uh hjk" value="<?php if (isset($class)) echo $class; ?>">
      <option value="SL">Sleeper</option>
      <option value="1A">AC First Class(1A)</option>
      <option value="2A">AC Second Class(2A)</option>
      <option value="3A">AC Third Class(3A)</option>
    </select>
    <button class="btn info hjk" name="trains" style="background-image: linear-gradient(to right, #007bff, #00a5ff); ">Find Trains</button>
    <script>document.getElementById('datePicker').valueAsDate = new Date();</script>
  </aside>
  <?php include('footer.php'); ?>
</form>


</body>
</html>