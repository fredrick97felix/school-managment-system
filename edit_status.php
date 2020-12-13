<?php
include('includes/dbconnection.php');
$iventory_no =$_GET['inventory_no'];
$status=$_GET[' status'];

$sql="UPDATE `inventory` SET  `status`='$status'
WHERE `inventory_no`= '$iventory_no'";

$run=mysqli_query($con,$sql);

if($run){

 mysqli_close($con);
 header("location:resource_manager_view_resource_list.php");
 exit;
}else{

 echo"error on edit";
}







?>