<?php
$name=$_SESSION['session']['name'];
//$name=$_COOKIE['koki']['name'];
//$role=$_COOKIE['koki']['role'];
require ('F_Connection.php');
?>
  <!-- BEGIN HEADER -->
  <!-- END HEADER -->
  <!-- BEGIN CONTAINER -->
  <!-- BEGIN SIDEBAR -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">        
          <p><?php echo $name?></p>
          <small> Employee</small>
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
            <i class="fa fa-user"></i>
            <span>Profile</span>
          </a>
        </li>

        <li class="treeview">
          <a href="T_ViewSchedule.php">
            <i class="fa fa-calendar"></i>
            <span>Schedule</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>