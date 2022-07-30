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
              <a class="nav-link" href="checkin.php" style="color:black;">CheckIn
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
            <th>Checked</th>
          </tr>
      </div>
    </div>

      <?php
      $ctr=-1;
      while(list($id,$ty,$loc,$chag,$sta,$pay)=fgetcsv($fp,1024,','))
      {
        $ctr++;
        if($sta=='Unavailable')
        echo "<tr>
                <td>$id</td><td>$ty</td><td>$loc</td><td>$chag</td>
                <td><form method='post' action='student.php'><input type='text' value='".$ctr."' name='cnt' style='display:none;'><input type='submit' name='del' value='Checkout'></form></td>
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
  $rw=$_POST["cnt"];
  header('Content-Type:text/plain');
  $ctr=0;
  $csv='F:\xampp\htdocs\hacmo\rooms.csv';
  function read_csv($filename)
  {
    $row=array();
    foreach (file($filename,FILE_IGNORE_NEW_LINES) as $line){
      $row[]=str_getcsv($line);
    }
    return $row;
  }
  function write($filename,$rows)
  {
    $file=fopen($filename,'w');
    foreach ($rows as $row) {
      fputcsv($file,$row);
    }
    fclose($file);
  }
  $fp=fopen($csv,'r');
  print_r(read_csv('rooms.csv'));
  $data=read_csv('rooms.csv');
  $data[$rw][4]='Available';
  write('rooms.csv',$data);
header("Refresh:0; url=student.php");
}
?>
<?php

    if(isset($_POST["ss15"]))
    {
      session_unset($usr);
      session_destroy();
      header("Refresh:0; url=admin.php");
    }
   ?>
