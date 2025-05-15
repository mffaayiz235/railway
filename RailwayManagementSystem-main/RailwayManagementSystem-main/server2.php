
<?php
	$from="";
	$to="";
	$x="";
	$errors=array();

	$db=mysqli_connect('localhost','root','pass123','registration');

	if(isset($_POST['trains'])){
		$from=mysqli_real_escape_string($db,$_POST['from']);
		$to=mysqli_real_escape_string($db,$_POST['to']);
		$date=mysqli_real_escape_string($db,$_POST['date']);
		$classes=mysqli_real_escape_string($db,$_POST['classes']);
		$q2="SELECT DAYNAME('$date') as days";
		$r2=mysqli_query($db,$q2);
		$row = mysqli_fetch_assoc($r2);
		$y=$row['days'];
		$q="SELECT * FROM train_info,train_schedule WHERE Source_Station_Name='$from' AND Destination_Station_Name='$to' AND days<>'$y' AND train_info.Train_No=train_schedule.Train_No";
		$r=mysqli_query($db,$q);
	}
	if(isset($_POST['reverse'])){
		$from2=mysqli_real_escape_string($db,$_POST['from2']);
		$to2=mysqli_real_escape_string($db,$_POST['to2']);
		$x=$from2;
		$from2=$to2;
		$to2=$x;
	}
?>
