<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style2.css">
	<title>Print Ticket</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
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
					</nav><br>
			<?php
			$conn=mysqli_connect('localhost','root','pass123','registration');
			if(isset($_POST["payment"])){
				$id=$_GET['id'];
				$query="SELECT * FROM pass_details WHERE B_id=$id";
				$q="UPDATE pass_details SET Success='CONFIRMED' WHERE B_id=$id";
				$q1="SELECT * FROM pass_details2 WHERE B_id=$id";
				$r=mysqli_query($conn,$q);
				$result=mysqli_query($conn,$query);
				$r1=mysqli_query($conn,$q1);
				echo '<br><br><h1 style="margin-top: 0px; color:black;"><b>JOURNEY DETAILS</b></h1>';
			
						echo '<table style="margin-top: 0px;"> 

						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> PNR Number </th> 
						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Train Number </th>
						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Amount Paid Per Person</th>
						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Date of Journey </th>';
						while ($row = mysqli_fetch_assoc($result))
						{ 
						$y=$row['Class'];
						$y1=$row['Success'];
						echo '<tr> 
						<td>'.$row['B_id'].'</td>
						<td>'.$row['Train_No'].'</td>
						<td>'.$row['Fare'].'</td> 
						<td>'.$row['Journey_date'].'</td>
						</tr>'; 
						}
						echo '</table>';
						
						echo "<br>";

					echo '<h1 style="margin-top: 40px; color:black;"><b>PASSENGER DETAILS</b></h1>';
						echo '<table class="container" style="margin-top: 0px;"> 

						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Passenger Name </th>
						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Gender </th>
 
						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Age </th>
						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Class</th>
						<th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Status of Booking</th>';
						while ($row1 = mysqli_fetch_assoc($r1))
						{ 
						echo '<tr> 
						<td>'.$row1['name'].'</td>
						<td>'.$row1['gender'].'</td>
						<td>'.$row1['age'].'</td>
						<td>'.$y.'</td>
						<td>'.$y1.'</td>
						</tr>'; 
						}
						echo '</table>';
						echo "<br>";
					}
		?>
		<br><br><br>
		<?php else: ?>
					<?php header('location: login.php'); ?>
				<?php endif ?>
		<?php include('footer.php'); ?>

</body>
</html>