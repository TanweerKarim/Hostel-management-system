<?php
  $con=mysqli_connect("localhost","root","","hacmo");
  if(isset($_POST['dl']))
  {
  $id=$_POST['dl'];
  $qur="DELETE from room where room_id = '$id'";
  $qurr=mysqli_query($con,$qur);
 }
 ?>
