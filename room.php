<?php
session_start();
$name=$_SESSION["id"];
  $usr=$_SESSION["id"];
  $tme=$_SESSION["t"];
  $tim=time();
  if(!$usr)
  {
    echo "<script>window.location.href='index.php'</script>";
  }
  if($tim>$tme)
  {
    session_unset($usr);
    session_destroy();
    echo "<script>
  window.reload();</script>";
}
 ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Hostel Accomodation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body style="background-image:url(bgpic.jpg);">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="admin.php" style="color:black;" target="_self">
          <strong>CheckOut</strong>
        </a>

        <!-- Collapse -->


        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#" style="color:black;">Insert
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <form action="admin.php" method="post">
                <input type="submit" name="ss15" value="Logout" style="background:none;border:none;margin-top:5px;">
              </form>
            </li>
          </ul>

          <!-- Right -->

        </div>

      </div>
    </nav>
    <section class="ftco-section">
  		<div class="container">
  			<div class="row justify-content-center">
  				<div class="col-md-12 col-lg-10">
  					<div class="wrap d-md-flex">
  						<div class="login-wrap p-4 p-lg-5" style="margin-left:250px;margin-top:80px;">
  			      	<div class="d-flex">
  			      		<div class="w-100">
  			      			<h3 class="mb-4 text-center">Create Room</h3>
  			      		</div>

  			      	</div>
  							<form action="room.php" method="post" class="signin-form">
  			      		<div class="form-group mb-3">
  			      			<input type="text" class="form-control" name="roomid" style="color:black;" placeholder="Room ID" required>
  			      		</div>
  		            <div class="form-group mb-3">
  		              <input type="text" class="form-control" name="roomtp" placeholder="Room Type" required>
  		            </div>
                  <div class="form-group mb-3">
  			      			<input type="text" class="form-control" name="location" placeholder="Location" required>
  			      		</div>
  		            <div class="form-group mb-3">
  		              <input type="text" class="form-control" name="charges" placeholder="Room Charge" required>
  		            </div>
  		            <div class="form-group">
  		            	<button type="submit" name="ins" class="form-control btn btn-primary submit px-3">Create</button>
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
    if(isset($_POST["ss15"]))
    {
      session_unset($usr);
      session_destroy();
      echo "<script>setTimeout(function() {
    location.reload();
  }, 10);</script>";
    }
   ?>
   <?php
   if(isset($_POST["ins"]))
{
$roomid=$_POST["roomid"];
$roomtp=$_POST["roomtp"];
$location=$_POST["location"];
$charges=$_POST["charges"];
$status="Available";
$payment="Not Paid";
$file_open=fopen("rooms.csv","a");
$rows=count(file("rooms.csv"));
if($row>1)
{
  $row=($row-1)+1;
}
$form_data = array(
  'room_id'=>$roomid,
  'room_type'=>$roomtp,
  'location'=>$location,
  'charges'=>$charges,
  'status'=>$status,
  'payment'=>$payment
);
if(fputcsv($file_open,$form_data))
{
  echo "<script>window.alert('Room Created Successfully')";
}
else {
  echo "<script>window.alert('Room can't be Created')";
}
}
    ?>
