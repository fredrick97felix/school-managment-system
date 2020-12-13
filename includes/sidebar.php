
<?php
  
  $i= $_SESSION['rank'];
  $school_reg_no=$_SESSION['school_reg_no'];
  
  $fetch="SELECT 	school_name,logo FROM `school` WHERE school_reg_no='$school_reg_no'";
      $ret=mysqli_query($con,$fetch);
      $row=mysqli_fetch_assoc($ret);
      
      $school_name=$row["school_name"];
      $logo=$row["logo"];

if($i=="resource"){

?>
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="myprofile.php">
        <div class="sidebar-brand-icon">
        <img src="<?php echo $logo ?>" class="img-rounded img-responsive" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3"> <?php echo $school_name ?> </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="resource_manager_dashboard.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <rect width="4" height="5" x="1" y="10" rx="1"/>
  <rect width="4" height="9" x="6" y="6" rx="1"/>
  <rect width="4" height="14" x="11" y="1" rx="1"/>
</svg>
          <span>Staffs Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="color:white;">
        view list
      </div>

    

      <!-- Nav Item - Utilities Collapse Menu -->
     

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="resource_manager_view_resource_list.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
</svg>
          <span>RESOURCES</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="resource_manager_view_book_list .php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.261 13.666c.345.14.739-.105.739-.477V2.5a.472.472 0 0 0-.277-.437c-1.126-.503-5.42-2.19-7.723.129C5.696-.125 1.403 1.56.277 2.063A.472.472 0 0 0 0 2.502V13.19c0 .372.394.618.739.477C2.738 12.852 6.125 12.113 8 14c1.875-1.887 5.262-1.148 7.261-.334z"/>
</svg>
          <span>BOOKS</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="resource_manager_view_building_list (.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-building" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694L1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
  <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
</svg>
          <span>BUILDING</span></a>
      </li>
      <div class="sidebar-heading" style="color:white;">
        REGISTER NEW 
      </div>

    

      <!-- Nav Item - Utilities Collapse Menu -->
     

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="resource_manager_add_new_resource.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
</svg>
          <span>ADD NEW RESOURCES</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="resource_manager_add_new_book.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
  <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
</svg>
          <span>ADD NEW BOOK</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resource_manager_add_new_building.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>
          <span>ADD NEW BUILDING</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resource_manager_add_new_room.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-easel-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8.473.337a.5.5 0 0 0-.946 0L6.954 2h2.092L8.473.337zM12.15 11h-1.058l1.435 4.163a.5.5 0 0 0 .946-.326L12.15 11zM8.5 11h-1v2.5a.5.5 0 0 0 1 0V11zm-3.592 0H3.85l-1.323 3.837a.5.5 0 1 0 .946.326L4.908 11zM1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3z"/>
</svg>
          <span>ADD NEW ROOM</span></a>
      </li>

     
      
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
<?php

}else if($i=="headmaster"){


?>

<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="myprofile.php">
        <div class="sidebar-brand-icon">
        <img src="<?php echo $logo ?>" class="img-rounded img-responsive" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $school_name ?> </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="head_dashboard.php">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <rect width="4" height="5" x="1" y="10" rx="1"/>
  <rect width="4" height="9" x="6" y="6" rx="1"/>
  <rect width="4" height="14" x="11" y="1" rx="1"/>
</svg>
          <span>Staffs Dashboard</span></a>
          <a class="nav-link" href="head_set_school_logo.php">
      
          <span>Add school logo</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="color:white;">
        view list
      </div>

    

      <!-- Nav Item - Utilities Collapse Menu -->
     

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="head_view_and_approve_student_results .php">
        
          <span>student results</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="head_view_students_attendence.php">
      
          <span>student attendenc</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="head_view_teacher_attendence.php">
     
          <span>teachers attendenc</span></a>
      </li>
      <div class="sidebar-heading" style="color:white;">
        REGISTER NEW 
      </div>

    

      <!-- Nav Item - Utilities Collapse Menu -->
     

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="head_register_staff.php">
      
          <span>register staff</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="head_appointment_of_staff.php">
      
          <span>appoint staff</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="head_appointment _of_head_of_depertment.php">
     
          <span>appoint head of depertment</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="head_assgnment_of_class_teachers.php">
      
          <span>appoint class teacher</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="head_assgnment_of_teacher_on_duty.php">
      
          <span> teacher on duty</span></a>
      </li>
     
      
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <?php 
      
     }else if($i=="academic"){  
    ?>
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="myprofile.php">
  <div class="sidebar-brand-icon">
  <img src="<?php echo $logo ?>" class="img-rounded img-responsive" width="50" height="50">
  </div>
  <div class="sidebar-brand-text mx-3"><?php echo $school_name ?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="academic_dashboard.php">
  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <rect width="4" height="5" x="1" y="10" rx="1"/>
  <rect width="4" height="9" x="6" y="6" rx="1"/>
  <rect width="4" height="14" x="11" y="1" rx="1"/>
</svg>
    <span>Staffs Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading" style="color:white;">
  view list
</div>



<!-- Nav Item - Utilities Collapse Menu -->


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="academic_view_student_results.php">
  
    <span>students results</span></a>
</li>

 
<div class="sidebar-heading" style="color:white;">
  REGISTER NEW 
</div>



<!-- Nav Item - Utilities Collapse Menu -->


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="academic_assgnment_of_subject_teacher.php">
  
    <span>subject teachers</span></a>
</li>

 <li class="nav-item">
  <a class="nav-link" href="academic_alocation _of_classes.php">
  
    <span>class allocation</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="academic_create_timetable.php">
  
    <span>timetable</span></a>
</li>
<li class="nav-item">




<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>

    <?php

     }else if($i=="admin"){

    ?>
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="myprofile.php">
  <div class="sidebar-brand-icon">
  <img src="<?php echo $logo ?>" class="img-rounded img-responsive" width="40" height="40">
  </div>
  <div class="sidebar-brand-text mx-3">Admin </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="admin_dashboard.php">
  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <rect width="4" height="5" x="1" y="10" rx="1"/>
  <rect width="4" height="9" x="6" y="6" rx="1"/>
  <rect width="4" height="14" x="11" y="1" rx="1"/>
</svg>
  
    <span>admin dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading" style="color:white;">
  view list
</div>



<!-- Nav Item - Utilities Collapse Menu -->


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="admin_register_school.php">
  
    <span>register school</span></a>
</li>

 <li class="nav-item">
  <a class="nav-link" href="admin_register_head.php">
  
    <span>register head</span></a>
</li>





<!-- Nav Item - Utilities Collapse Menu -->





<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>


    <?php

     }else{
    
    ?>
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="myprofile.php">
  <div class="sidebar-brand-icon">
  <img src="<?php echo $logo ?>" class="img-rounded img-responsive" width="50" height="50">
  </div>
  <div class="sidebar-brand-text mx-3"> <?php echo $school_name ?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="teacher_dashboard.php">
  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <rect width="4" height="5" x="1" y="10" rx="1"/>
  <rect width="4" height="9" x="6" y="6" rx="1"/>
  <rect width="4" height="14" x="11" y="1" rx="1"/>
</svg>
  
    <span>Staffs Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading" style="color:white;">
  view list
</div>



<!-- Nav Item - Utilities Collapse Menu -->


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="teacher_view_students_results.php">
  <
    <span>results</span></a>
</li>

 <li class="nav-item">
  <a class="nav-link" href="teacher_view_students_result_of_his_class.php">
  
    <span>view class results</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="teacher_generate_students_report.php">
  
    <span>report</span></a>
</li>

<div class="sidebar-heading" style="color:white;">
  REGISTER NEW 
</div>



<!-- Nav Item - Utilities Collapse Menu -->


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="teacher_upload_students_results.php">
 
    <span>upload results</span></a>
</li>

 <li class="nav-item">
  <a class="nav-link" href="teacher_suggest_subject_teacher.php">

    <span>suggest teacher</span></a>
</li>
<li class="nav-item">
  
</li>



<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>

    <?php
    
     }
    ?>