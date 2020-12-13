<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            <h3 class="h3 mb-0 text-success"><span><img src="img/i1.png" class="img-rounded img-responsive" width="30" height="30"></span>SCHOOL MANAGMENT SYSTEM</h3>
              
            </div>
          </form>
          <!-- Topbar Navbar -->
          <?php
require_once("includes/dbconnection.php");
$reg_no=$_SESSION['reg_no'];
$sql="SELECT * 
FROM   `staff`
WHERE  reg_no='$reg_no'";

$ret=mysqli_query($con,$sql);
if($row=mysqli_fetch_assoc($ret)){
  $name=$row['first_name'];
  $img=$row['img'];
}

?>
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="img/i1.png" class="img-rounded img-responsive" width="100" height="100"> 
              </a>
              
             

            <div class="topbar-divider d-none d-sm-block">
            
            </div>
            
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                 <img src="<?php echo $img?>" class='img-rounded img-responsive' width='30' height='30'>
                 </a>
                
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="myprofile.php">
                <img src="img/icons/person-circle-outline.svg" class="img-rounded img-responsive" width="20" height="20"> 
                  My Profile
                </a>
                
                
                

                <a class="dropdown-item" href="changepassword.php">
                <img src="img/icons/settings.svg" class="img-rounded img-responsive" width="20" height="20">
                  Change Password
                </a>
                
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" >

                <img src="img/icons/log-out.svg" class="img-rounded img-responsive" width="20" height="20">
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>