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
	<body style="background-image:url(bgpic.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
              <div class="login-wrap p-4 p-lg-5 order-md-last" style="background-image: linear-gradient(to right, #FFD54F, #D500F9)">
  			      	<div class="d-flex">
  			      		<div class="w-100">
  			      			<h3 class="mb-4">Login for Admin</h3>
  			      		</div>

  			      	</div>
  							<form action="../hacmo/index.php" method="post" class="signin-form">
  			      		<div class="form-group mb-3">
  			      			<label class="label" for="name">Username</label>
  			      			<input type="text" class="form-control" name="uname" placeholder="Username" required>
  			      		</div>
  		            <div class="form-group mb-3">
  		            	<label class="label" for="password">Password</label>
  		              <input type="password" class="form-control" name="passw" placeholder="Password" required>
  		            </div>
  		            <div class="form-group">
  		            	<button type="submit" name="s1" class="form-control btn btn-primary submit px-3">Sign In</button>
  		            </div>
  		          </form>
  		        </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Login for Student</h3>
			      		</div>

			      	</div>
							<form action="index.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" name="uname" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label"  for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="s2" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<a href="signup.php">Sign Up?</a>
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
        $user_name=$_POST["uname"];
        $pass=$_POST["passw"];
        echo $user_name." ".$pass;
        if($user_name==$usern&&$passw==$pass)
        {
          echo "hello";
          $_SESSION["id"]=$user_name;
          $_SESSION["t"]=time()+1800;
          echo "<script>window.location.href='admin.php'</script>";
        }
        else {
          echo "<script>window.alert('Wrong User Name and Password')</script>";
        }
      }
      if(isset($_POST["s2"]))
      {
        $csv='C:\xampp\htdocs\hacmo\student.csv';
        $fp=fopen($csv,'r');
        list($usern,$passw)=fgetcsv($fp,1024,',');
        echo $usern."  ".$passw;
        $user_name=$_POST["uname"];
        $pass=$_POST["password"];
        echo $user_name." ".$pass;
        if($user_name==$usern&&$passw==$pass)
        {
          echo "hello";
          $_SESSION["id"]=$user_name;
          $_SESSION["t"]=time()+1800;
          echo "<script>window.location.href='student.php'</script>";
        }
        else {
          echo "<script>window.alert('Wrong User Name and Password')</script>";
        }
      }
     ?>
