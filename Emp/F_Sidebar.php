<?php
$name=$_SESSION['session']['name'];
$userid=$_SESSION['session']['userid'];
$jobtitle=$_SESSION['session']['jobtitle'];
$sql="SELECT e.`Profile_Pic`
     FROM  employee as e
     WHERE e.`User_ID` = '$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$profile_pic = $row[0];
require ('F_Connection.php');
?>
  <!-- BEGIN SIDEBAR -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">        
          <p class="text-yellow"><?php echo $name?></p>
          <small class="text-yellow"><?php echo $jobtitle?></small>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview">
          <a href="S_Dashboard_.php">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview">
         <a href="T_ViewProfile.php">
            <i class="fa fa-user "></i>
            <span>Profile</span>
          </a>
        </li>

         <li class="treeview">
         <a href="T_LeaveRequest.php">
            <i class="fa fa-calendar-o "></i>
            <span>Request Leave</span>
          </a>
        </li>

        <li class="treeview">
         <a href="Employee_User_Account.php">
            <i class="fa fa-laptop "></i>
            <span>User Account</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>