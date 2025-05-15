<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>TRAIN STATUS</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" type="text/css" href="style2.css">
	<?php
			$conn=mysqli_connect("localhost","root","pass123","registration");
			$train_no="";
		?>	
	<style>
		
		h1{
			color:black;
		}
		button .btn{
			padding: 10px;
			margin: 10px auto;
			font-size: 15px;
			border: none;
			border-radius: 20px;
		}
		
		
	</style>
	<style>


.train-info h1 {
color:#007bff;
  font-size: 30px;
}

.train-info p {
	color:#007bff;
  font-size: 30px;
  text-align:center;
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
				      <li class="nav-item">
				        <a class="nav-link" href="index.php">Book Tickets<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item active">
				        <a class="nav-link" href="train_stas.php">Train Status</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="pnr.php">PNR Enquiry</a>
				      </li>
				    </ul>		   
					<span class="navbar-text">
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
				        <a class="nav-link" href="index.php">Book Tickets<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item active">
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
			<br>
			<div class="header" style="background: linear-gradient(to right, #007bff, #00a5ff); padding-top: 30px;">
    <h2>TRAIN STATUS<br><?php if (isset($_POST['train_no'])) echo $_POST['train_no']; ?></h2>
</div>

<div >
    <form action="train_stas.php" method="post" style="height: 350px;padding-bottom:30px;">
        <div class="input-group">
            <label>Train Number:</label>
        </div>
        <div class="input-group">
            <input type="text" name="train_no" value="<?php if (isset($_POST['train_no'])) echo $_POST['train_no']; ?>" class="input-group">
        </div>
		<div class="input-group" style="padding-bottom: 30px;">
        <center>
            <button type="submit" name="submit" class="btn-primary" style="color: white; background: linear-gradient(to right, #007bff, #00a5ff); margin: 10px; padding: 10px; border: none; border-radius: 10px;">Get Schedule</button>
            <button type="submit" name="track_train" class="btn-primary" style="color: white; background: linear-gradient(to right, #007bff, #00a5ff); margin: 10px; padding: 10px; border: none; border-radius: 10px;">Track Train</button>
        </center>
    </div>
</div>
<br>

<?php
if (isset($_POST["submit"])) {
    $train_no = mysqli_real_escape_string($db, $_POST['train_no']);
    $query = "SELECT `SN`,`Station_Name`, `Route_Number`, `Arrival_time`, `Departure_Time`, `Distance`, `Station_Code` FROM `train_schedule` WHERE `Train_No`=$train_no";
    $q = "SELECT * FROM train_info WHERE Train_No=$train_no";
    $r = mysqli_query($db, $q);
    $result = mysqli_query($db, $query);

    if (!$r || mysqli_num_rows($r) == 0) {
        echo "<h3>Please enter a valid train number.</h3>";
    } else {
        echo "<div style='padding:20px; width:50%; background-color:#fff;' class='container jumbotron'>";
        echo '<table> 
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Train Number </th> 
        <th style="background: linear-gradient(to right, #007bff, #00a5ff); "> Train Name </th>
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> From Station </th>
        <th style="background: linear-gradient(to right, #007bff, #00a5ff); "> Destination Station Name </th>';
        while ($row = mysqli_fetch_assoc($r)) {
            echo '<tr> 
            <td>' . $row['Train_No'] . '</td>
            <td>' . $row['Train_Name'] . '</td>
            <td>' . $row['Source_Station_Name'] . '</td>
            <td>' . $row['Destination_Station_Name'] . '</td> 
            </tr>';
        }
        echo '</table>';
        echo "</div>";
        echo "<br>";
        echo '<table> 
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> S.N. </th> 
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Station Code </th>
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Station Name </th>
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Route Number </th>
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Arrival Time </th>
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Departure Time </th>
        <th style="background: linear-gradient(to right, #007bff, #00a5ff);"> Distance </th>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr> 
            <td>' . $row['SN'] . '</td>
            <td>' . $row['Station_Code'] . '</td>
            <td>' . $row['Station_Name'] . '</td>
            <td>' . $row['Route_Number'] . '</td> 
            <td>' . $row['Arrival_time'] . '</td>
            <td>' . $row['Departure_Time'] . '</td>
            <td>' . $row['Distance'] . '</td>
            </tr>';
        }
        echo '</table>';
    }
}

// Train Tracker
if (isset($_POST["track_train"])) {
    $train_no = mysqli_real_escape_string($db, $_POST['train_no']);

    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date("H:i:s"); // Get the current time

    $query = "SELECT `SN`, `Station_Name`, `Route_Number`, `Arrival_time`, `Departure_Time`, `Distance`, `Station_Code`
              FROM `train_schedule`
              WHERE `Train_No` = ? AND TIME(`Arrival_time`) <= TIME(?) AND TIME(`Departure_Time`) >= TIME(?)
              ORDER BY `SN`";

    $stmt = $db->prepare($query);
    $stmt->bind_param("sss", $train_no, $currentTime, $currentTime);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($sn, $stationName, $routeNumber, $arrivalTime, $departureTime, $distance, $stationCode);

    if ($stmt->num_rows > 0) {
        // Train is currently at a station
        $stmt->fetch();
        $remainingTime = strtotime($departureTime) - strtotime($currentTime);

        if ($remainingTime = 0) {
            // Train is about to depart or has already departed
            if ($stmt->fetch()) {
                $nextStationName = $stationName;
                $nextDepartureTime = $departureTime;
                $timeToNextStation = strtotime($nextDepartureTime) - strtotime($currentTime);
                $formattedTime = date("H:i:s", $timeToNextStation); // Format time as hour:min:seconds
                echo "<h1>Train is currently at $stationName<br>It will depart shortly<br> Next station: $nextStationName<br> Time to reach: $formattedTime.</h1>";
            }
        } else {
            // Train is currently at the station
            echo "<div class='train-info'><h1>Train is currently at $stationName.</h1></div>";
        }
    } else {
        $stmt->close();

        // Retrieve the next station's details
        $queryNextStation = "SELECT `SN`, `Station_Name`, `Route_Number`, `Arrival_time`, `Departure_Time`, `Distance`, `Station_Code`
                             FROM `train_schedule`
                             WHERE `Train_No` = ? AND TIME(`Departure_Time`) >=TIME(?)
                             ORDER BY `SN` ASC LIMIT 1";

        $stmtNextStation = $db->prepare($queryNextStation);
        $stmtNextStation->bind_param("ss", $train_no, $currentTime);
        $stmtNextStation->execute();
        $stmtNextStation->store_result();
        $stmtNextStation->bind_result($sn, $stationName, $routeNumber, $arrivalTime, $departureTime, $distance, $stationCode);

        if ($stmtNextStation->num_rows > 0 && $stmtNextStation->fetch()) {
          date_default_timezone_set('Asia/Kolkata');

            $nextStationName = $stationName;
            $nextArrivalTime = $arrivalTime;
            $timeToNextStation = strtotime($nextArrivalTime) - strtotime($currentTime);
            $seconds = $timeToNextStation;

            $hours = floor($seconds / 3600);
            $minutes = floor(($seconds % 3600) / 60);
            $seconds = $seconds % 60;
            
            $formattedTime = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
            if ($formattedTime>0){			echo "<center><div class='train-info'>";
			echo "<h1>Train is not at any station.</h1>";
			echo "<p>Next station: $nextStationName</p>";
			echo "<p>Time to reach: $formattedTime</p>";
			echo "</div></center>";}
      else{
        $stmtNextStation->close();


            $queryLastStation = "SELECT `SN`, `Station_Name`, `Route_Number`, `Arrival_time`, `Departure_Time`, `Distance`, `Station_Code`
                             FROM `train_schedule`
                             WHERE `Train_No` = ? 
                             ORDER BY `SN` DESC LIMIT 1";
             $stmtLastStation = $db->prepare($queryLastStation);
             $stmtLastStation->bind_param("s", $train_no);
             $stmtLastStation->execute();
             $stmtLastStation->store_result();
             $stmtLastStation->bind_result($sn, $stationName, $routeNumber, $arrivalTime, $departureTime, $distance, $stationCode);
              $stmtLastStation->fetch();
             $laststation=$stationName;
            echo "<div class='train-info'><h1>Train is at $laststation.</h1></div>";
            $stmtLastStation->close();
      }

					} else {
            $stmtNextStation->close();


            $queryLastStation = "SELECT `SN`, `Station_Name`, `Route_Number`, `Arrival_time`, `Departure_Time`, `Distance`, `Station_Code`
                             FROM `train_schedule`
                             WHERE `Train_No` = ? 
                             ORDER BY `SN` DESC LIMIT 1";
             $stmtLastStation = $db->prepare($queryLastStation);
             $stmtLastStation->bind_param("s", $train_no);
             $stmtLastStation->execute();
             $stmtLastStation->store_result();
             $stmtLastStation->bind_result($sn, $stationName, $routeNumber, $arrivalTime, $departureTime, $distance, $stationCode);
              $stmtLastStation->fetch();
             $laststation=$stationName;
            echo "<div class='train-info'><h1>Train is at $laststation.</h1></div>";
            $stmtLastStation->close();

        }

    }



	
	
}
?>

		
	</form>
	<br>
	<div style="margin-top:65px">
	<?php include('footer.php'); ?>
	</div>
</body>
</html
