<?php
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Hostel Accomodation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="login-wrap p-4 p-lg-5" style="margin-left:250px;">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Signup for Student</h3>
			      		</div>

			      	</div>
							<form action="signup.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control" name="uname" placeholder="Enter Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="s1" class="form-control btn btn-primary submit px-3">Sign Up</button>
		            </div>
                <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<a href="index.php" style="border:1px solid black;border-radius:5px;;">Home</a>
									</div>
		            </div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>

	</body>
</html>
<?php
      if(isset($_POST["s1"]))
      {
        $csv='C:\xampp\htdocs\hacmo\admin.csv';
        $fp=fopen($csv,'r');
        list($usern,$passw)=fgetcsv($fp,1024,',');
        echo $usern."  ".$passw;
      }
     ?>
