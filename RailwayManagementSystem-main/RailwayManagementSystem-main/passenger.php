<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Passenger Details</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		 body {
            background: #F8F8FF;
        }
		h1,h2{
			margin-left: auto;
			margin-right: auto;
			margin-top: 10px;
			margin-bottom: 0px;
			text-align: center;
			padding: 10px;
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
					</div>
				</nav>
				<br><br><br>
				<b><h1 style="color:#007bff; font-size: 50px;">BOOK</h1>
<h2 style="color:black; text-align:center; font-size: 40px;">YOUR TICKET</h2></b>

			<?php 
				$id=$_GET['id'];
			    $fare=$_GET['fare'];
				$n=$_GET['n'];
				$date=$_GET['date'];
				$class=$_GET['class2'];
				$i=1;
				$pass_name=array();
				$age=array();
				$gender=array();
				$db2=mysqli_connect('localhost','root','pass123','registration');
				$q1="INSERT INTO `pass_details`(`Train_No`, `Fare`,`Success`,`Journey_date`,`class`) VALUES ('$id','$fare','NOT CONFIRMED','$date','$class')";
				$r1=mysqli_query($db2,$q1);				
				while($n!=0){
			?>
					<form class="container block" style="margin-top: 10px;" action="payment.php?n=<?php echo $n;?>" method="post">
					<div style="border: 1px solid grey; padding: 8px 30px;	background:white; margin-top: 30px;">
					<div class="form-row" style="margin-bottom:10px">
						<i class="fa fa-address-card w3-xlarge"></i><div style="margin-left: 20px;"><?php echo $i;?></div>
					</div>
			  <div class="form-row" >
			    <div class="col-md mb-3">
			      <label for="validationDefault01">Name</label>
			      <input type="text" class="form-control" id="validationDefault01" name="pass_name[<?php echo $i;?>]" value="<?php if (isset($_POST['pass_name'])) echo $_POST['pass_name']; ?>" required>
			    </div>
			    <div class="col-md mb-3">
			      <label for="validationDefault02">Age</label>
				  <input type="number" class="form-control" id="validationDefault02" name="age[<?php echo $i;?>]" value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>" required min="1">
			    </div>
			    <div class="col-md mb-3">
			      <label for="validationDefault02">Gender</label>
			      <select name="gender[<?php echo $i;?>]" class="form-control">
			      			<option value="<?php if (isset($_POST['gender'])) echo $_POST['gender']; ?>" selected><?php if (isset($_POST['gender'])) echo $_POST['gender']; ?></option>
						    <option value="male">Male</option>
						    <option value="female">Female</option>
						    <option value="trans">Transgender</option>
					</select>
			    </div>
			</div>
		</div>
		<?php 
		$n=$n-1;
				$i=$i+1;
				}
			?>
			<div class="col-md" style="margin-top: 35px">
			<center>
  <button class="btn btn-info" style="background:linear-gradient(to right, #007bff, #00a5ff); padding: 10px 20px; font-size: 18px;" type="submit" name="details">SUBMIT</button>
</center>
			 </div>
		</form>
		<br><br><br><br><br><br>
		<?php include('footer.php'); ?>

			<?php else: ?>
					<?php header('location: login.php'); ?>
				<?php endif ?>
	</body>
</html>