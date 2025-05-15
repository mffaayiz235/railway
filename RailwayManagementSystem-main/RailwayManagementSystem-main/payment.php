<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Payment Portal</title>
	<style>
		 body {
            background: #F8F8FF;
        }
		.padding {
			    padding: 5rem !important
			}

			.form-control:focus {
			    box-shadow: 10px 0px 0px 0px #ffffff !important;
			    border-color: #4ca746
			}
	</style>
</head>
<body>
<?php
		$db=mysqli_connect('localhost','root','pass123','registration');
		$q1="SELECT MAX(B_id) as B_id FROM pass_details";
		$r1=mysqli_query($db,$q1);
		$row = mysqli_fetch_assoc($r1);
		$y=$row['B_id'];
		for($i=1;$i<=$_GET['n'];$i++){
				if(isset($_POST['details'])){
				$pass_name=mysqli_real_escape_string($db,$_POST['pass_name'][$i]);
				$age=mysqli_real_escape_string($db,$_POST['age'][$i]);
				$gender=mysqli_real_escape_string($db,$_POST['gender'][$i]);				
				$q2="INSERT INTO `pass_details2`(`B_id`, `name`, `gender`, `age`) VALUES ('$y','$pass_name','$gender','$age')";
				$r2=mysqli_query($db,$q2);
			}
		}
?>
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
					</nav>
			<form method="post" action="pnr2.php?id=<?php echo $y;?>" class="padding" style="margin-top: 30px;">
    <div class="row">
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header" style="color: white; background: linear-gradient(to right, #007bff, #00a5ff)">
                        <div class="row" >
                           <br> <div class="col-md-6" style="margin-top:5px;"><span> <h4>CREDIT/DEBIT CARD PAYMENT</h4></span></div>
                            <div class="col-md-6 text-right" style="margin-top: 5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 350px">
                        <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-cvc" class="control-label">CARD CVV</label> <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="••••" required> </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="numeric" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control"> </div>
						<div class="form-group text-center"> 
            <button name="payment" type="submit" class="btn btn-primary" style="font-size: 20px;background: linear-gradient(to right, #007bff, #00a5ff);">MAKE PAYMENT</button>
        </div>	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</form>
	<br><br>
	<script type="text/javascript">
		$(function($) {
			$('[data-numeric]').payment('restrictNumeric');
			$('.cc-number').payment('formatCardNumber');
			$('.cc-exp').payment('formatCardExpiry');
			$('.cc-cvc').payment('formatCardCVC');
			$.fn.toggleInputError = function(erred) {
			this.parent('.form-group').toggleClass('has-error', erred);
			return this;
			};
			$('form').submit(function(e) {
			e.preventDefault();
			var cardType = $.payment.cardType($('.cc-number').val());
			$('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
			$('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
			$('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
			$('.cc-brand').text(cardType);
			$('.validation').removeClass('text-danger text-success');
			$('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
			});
			});
	</script>

			<?php else: ?>
					<?php header('location: login.php'); ?>
				<?php endif ?>
			<?php include('footer.php'); ?>
</body>
</html>