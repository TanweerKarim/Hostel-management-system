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
    header("Refresh:0; url=admin.php");
}
$csv='C:\xampp\htdocs\hacmo\rooms.csv';
$fp=fopen($csv,'r');
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
  <script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

	</head>
	<body style="background-image:url(bgpic.jpg);color:red;">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="https://mdbootstrap.com/material-design-for-bootstrap/" style="color:black;" target="_blank">
          <strong>CheckOut</strong>
        </a>

        <!-- Collapse -->


        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="room.php" style="color:black;">Insert
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
    <div class="container">
      <div class="row">
        <table class="table-striped" border="1" style="width:1000px;color:black;margin-top:150px;margin-left:80px;background:white;">
          <tr>
            <th>#id</th>
            <th>Type</th>
            <th>Location</th>
            <th>Charge</th>
            <th>Room Status</th>
            <th>Payment Status</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
      </div>
    </div>

      <?php
      $ctr=-1;
      while(list($id,$ty,$loc,$chag,$sta,$pay)=fgetcsv($fp,1024,','))
      {
        $ctr++;
        echo "<tr>
                <td>$id</td><td>$ty</td><td>$loc</td><td>$chag</td><td>$sta</td><td>$pay</td>
                <td><input type='button' onclick='del()' value='Update'></td>
                <td><form method='post' action='admin.php'><input type='text' value='".$ctr."' name='cnt' style='display:none;'><input type='submit' name='del' value='Delete'></form></td>
              </tr>
        ";
      }
       ?>
    </table>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php
if(isset($_POST["del"]))
{
$dta=$_POST["cnt"];
$cnt = 0;
if (($handle = fopen("rooms.csv", "r")) !== FALSE) {
    while (($csvadata = fgetcsv($handle, 0, ",")) !== FALSE) {
	   $data[$cnt++] = $csvadata;
    }
    fclose($handle);
	unset($data[$dta]);
}
$fp = fopen('rooms.csv', 'w');
foreach ($data as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
header("Refresh:0; url=admin.php");
}
?>
<?php

    if(isset($_POST["ss15"]))
    {
      unset($usr);
      session_destroy();
      header("Refresh:0; url=admin.php");
    }
   ?>
