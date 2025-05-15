<?php include('server2.php'); ?>
<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Train List</title>
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
				      <li class="nav-item">
				        <a class="nav-link" href="login.php">Book Tickets<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item active">
				        <a class="nav-link" href="train_stas.php#">Train Status</a>
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
			<form class="container" style="margin-top: 25px" action="confirm.php" method="post">
			  <div class="form-row">
			    <div class="col-md mb-3">
			      <label for="validationDefault01">Source</label>
			      <input type="text" class="form-control" id="validationDefault01" name="from2" value="<?php if (isset($from2)) echo $from2;
			      else if (isset($_POST['from2'])) echo $_POST['from2']; else if(isset($from)) echo $from; ?>" required>
			    </div>
			    <button style="border:none; background-color: #F8F8FF; outline:none;" name="reverse"><span class="material-icons">swap_horiz</span></button><br>
			    <div class="col-md mb-3">
			      <label for="validationDefault02">Destination</label>
			      <input type="text" class="form-control" id="validationDefault02" name="to2" value="<?php if (isset($to2)) echo $to2;  else if (isset($_POST['to2'])) echo $_POST['to2'];  else if(isset($to)) echo $to; ?>" required>
			    </div>
			    <div class="col-md mb-3">
			      <label for="validationDefault02">Journey Date</label>
			      <input type="date" class="form-control" id="validationDefault02" placeholder="yyyy-mm-dd" name="date2" value="<?php if (isset($_POST['date2'])) echo $_POST['date2']; else if(isset($date)) echo $date; ?>" required>
			    </div>
			    <div class="col-md mb-3">
			      <label for="validationDefault02">Journey Class</label>
			      <select name="class2" class="form-control">
			      			<option value="<?php if (isset($_POST['class2'])) echo $_POST['class2']; else if (isset($classes)) echo $classes; ?>" selected><?php if (isset($_POST['class2'])) echo $_POST['class2']; else if (isset($classes)) echo $classes; ?></option>
						    <option value="SL">Sleeper</option>
						    <option value="1A">AC First Class(1A)</option>
						    <option value="2A">AC Second Class(2A)</option>
						    <option value="3A">AC Third Class(3A)</option>
					</select>
			    </div>
			    <div class="col-md mb-3">
			      <label for="validationDefault02">No. of Passengers</label>
			      <select name="num" class="form-control">
			      			<option value="<?php if (isset($_POST['num'])) echo $_POST['num']; else echo "1"; ?>" selected><?php if (isset($_POST['num'])) echo $_POST['num']; else echo "1"; ?></option>
						    <option value="1">1</option>
						    <option value="2">2</option>
						    <option value="3">3</option>
						    <option value="4">4</option>
						    <option value="5">5</option>
					</select>
			    </div>
			    <div class="col-md" style="margin-top: 35px">
			  		<button class="btn btn-primary" style="background: linear-gradient(to right, #007bff, #00a5ff);" type="submit" name="modify">Modify Search</button><br><br><br>
			  	</div>
			</div>
		</form>
			<?php
		
			if(isset($_POST["trains"])){
				$from=mysqli_real_escape_string($db,$_POST['from']);
				$to=mysqli_real_escape_string($db,$_POST['to']);
				$date=mysqli_real_escape_string($db,$_POST['date']);
				$class=mysqli_real_escape_string($db,$_POST['classes']);
				$q2="SELECT DAYNAME('$date') as days";
				$r2=mysqli_query($db,$q2);
				$row = mysqli_fetch_assoc($r2);
				$y=$row['days'];
				$q="SELECT train_info.Train_No,Train_Name,$class,`Departure_Time` FROM train_info,train_schedule WHERE Source_Station_Name='$from' AND Destination_Station_Name='$to' AND days<>'$y' AND train_schedule.Train_No=train_info.Train_No AND Station_Name='$from'";
				$r=mysqli_query($db,$q);
				$q1="SELECT `Arrival_Time` FROM train_info,train_schedule WHERE Source_Station_Name='$from' AND Destination_Station_Name='$to' AND days<>'$y' AND train_schedule.Train_No=train_info.Train_No AND Station_Name='$to'";
				$r1=mysqli_query($db,$q1);
				if(!$r||mysqli_num_rows($r)==0){
						echo "<h3>No Trains Found.</h3>";
					}
					else{
						echo "<h5 class='container' style='margin-bottom:40px;'><div class='row'><div class='col-md'><b>$from<i class='material-icons' style='font-size:20px;'>arrow_forward</i>$to</div>Class: $class<div class='col-md' style='text-align:right;'>$y</b></div></div></h5>";
						echo '<table class="container"> 

						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Train Number </th> 
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Train Name </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Depature Time </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Arrival Time </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Fare </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Book Ticket </th>';
						while (($row = mysqli_fetch_assoc($r)) && ($ro = mysqli_fetch_assoc($r1)))
						{ 
						?>
						<tr> 
						<td><?php echo $row['Train_No']; ?></td>
						<td><?php echo $row['Train_Name']; ?></td>
						<td><?php echo $row['Departure_Time']; ?></td>
						<td><?php echo $ro['Arrival_Time']; ?></td>
						<td><?php echo "Rs.".$row[$class]; ?></td>
						<td><button type="button" class="btn-success" style="border: none; border-radius: 5px; padding-left: 5px; padding-right: 5px; 

"><a href="passenger.php?id=<?php echo $row['Train_No'];?>&n=<?php echo "1";?>&fare=<?php echo $row[$class];?>&date=<?php if (isset($date)) echo $date;?>&class2=<?php echo $class;?>" style="color:white">Book Now</a></button></td>
						</tr>
						<?php 
						}
						echo '</table>';
					}
				}
			else if(isset($_POST["modify"])){
				$from2=mysqli_real_escape_string($db,$_POST['from2']);
				$to2=mysqli_real_escape_string($db,$_POST['to2']);
				$date2=mysqli_real_escape_string($db,$_POST['date2']);
				$class2=mysqli_real_escape_string($db,$_POST['class2']);
				$q2="SELECT DAYNAME('$date2') as days";
				$r2=mysqli_query($db,$q2);
				$row = mysqli_fetch_assoc($r2);
				$y=$row['days'];
				$q="SELECT train_info.Train_No,Train_Name,$class2,`Departure_Time` FROM train_info,train_schedule WHERE Source_Station_Name='$from2' AND Destination_Station_Name='$to2' AND days<>'$y' AND train_schedule.Train_No=train_info.Train_No AND Station_Name='$from2'";
				$r=mysqli_query($db,$q);
				$q1="SELECT `Arrival_Time` FROM train_info,train_schedule WHERE Source_Station_Name='$from2' AND Destination_Station_Name='$to2' AND days<>'$y' AND train_schedule.Train_No=train_info.Train_No AND Station_Name='$to2'";
				$r1=mysqli_query($db,$q1);
				if(!$r||mysqli_num_rows($r)==0){
						echo "<h3>No Trains Found.</h3>";
					}
					else{
						echo "<h5 class='container' style='margin-bottom:40px;'><div class='row'><div class='col-md'><b>$from2<i class='material-icons' style='font-size:20px;'>arrow_forward</i>$to2</div>Class: $class2<div class='col-md' style='text-align:right;'>$y</b></div></div></h5>";
						echo '<table class="container"> 

						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Train Number </th> 
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Train Name </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Depature Time </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Arrival Time </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Fare </th>
						<th style="background:linear-gradient(to right, #007bff, #00a5ff);"> Book Ticket </th>';
						while (($row = mysqli_fetch_assoc($r)) && ($ro = mysqli_fetch_assoc($r1)))
						{ 
						?>
						<tr> 
						<td><?php echo $row['Train_No']; ?></td>
						<td><?php echo $row['Train_Name']; ?></td>
						<td><?php echo $row['Departure_Time']; ?></td>
						<td><?php echo $ro['Arrival_Time']; ?></td>
						<td><?php echo "Rs.".$_POST['num']*$row[$class2]; ?></td>
						<td><button type="button" class="btn-success" style="border: none; border-radius: 5px; padding-left: 5px; padding-right: 5px;"><a href="passenger.php?id=<?php echo $row['Train_No'];?>&n=<?php echo $_POST['num'];?>&fare=<?php echo $row[$class2];?>&date=<?php if (isset($date2)) echo $date2;?>&class2=<?php echo $class2;?>" style="color:white">Book Now</a></button></td>
						</tr>
						<?php 
						}
						echo '</table>';
					}
				}
			?>
			<br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br>
			<?php include('footer.php'); ?>
</body>
</html>