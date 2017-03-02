<!DOCTYPE html>
<html>


<?php require('F_Connection.php');?>
<?php require('S_Header.php');?>
<?php require('S_Sidebar.php');?>
<?php
$userid=$_SESSION['session']['userid'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel='shortcut icon' type='image/x-icon' href='logo.png'/>
  <title>Jenus ITS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Management System
        <small>| Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="S_Dashboard_.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">

      <!--CONTENT HERE!-->
    <div class="col-md-12">
      <script>
        var d = new Date(<?php echo time() * 1000 ?>);

        function updateClock() {
          // Increment the date
        d.setTime(d.getTime() + 1000);

        // Translate time to pieces
       var currentHours = d.getHours();
       var currentMinutes = d.getMinutes();
       var currentSeconds = d.getSeconds();

        // Add the beginning zero to minutes and seconds if needed
      currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
      currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

      // Determine the meridian
      var meridian = (currentHours < 12) ? "AM" : "PM";

      // Convert the hours out of 24-hour time
      currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
      currentHours = (currentHours == 0) ? 12 : currentHours;

      // Generate the display string
     var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + meridian;

      // Update the time
      document.getElementById("clock").firstChild.nodeValue = currentTimeString;
                          }

    window.onload = function() {
    updateClock();
    setInterval('updateClock()', 1000);
                              }
    </script>
        <body>
          <h1 align="center">
            <div id="clock">&nbsp;</div></h1>
          <h3 align="center">            
            <?php $today = date("l, F j, Y");
            echo $today; 

            /*$result = mysqli_query($con, "SELECT `ID` FROM `time` WHERE `User_ID` = '$userid' AND DATE(`Time_In`) = CURDATE() ORDER BY `Time_In` DESC LIMIT 1");
            $row = mysqli_fetch_array($result);
            $id = $row[0];*/

            $result = mysqli_query($con, "SELECT `Time_In`, `Break_In`, `Break_Out`, `Time_Out`, `ID` FROM `time` WHERE `User_ID` = '$userid' AND DATE(`Time_In`) = CURDATE() ORDER BY `Time_In` DESC LIMIT 1");

            $yes = mysqli_num_rows($result);
            if($yes >= 1){            
              while($row = mysqli_fetch_array($result)){
                  $timein = $row[0];
                  $breakin = $row[1];
                  $breakout = $row[2];
                  $timeout = $row[3];
                  $id = $row[4];
                }

                if(empty($id) && $timein == '0000-00-00 00:00:00')
                  $stat = 'Time-In';

                if(!empty($id) && $breakin == '0000-00-00 00:00:00')
                  $stat = 'Start Lunch Break';

                if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout == '0000-00-00 00:00:00')
                  $stat = 'End Lunch Break';

                if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00' && $timeout == '0000-00-00 00:00:00')
                  $stat = 'Time-Out';

                if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout != '0000-00-00 00:00:00' && $timeout != '0000-00-00 00:00:00')
                  $stat = 'Time-In';
              }
            else
              $stat = 'Time-In';
              /*$id = 0;*/

            ?>            
        </h3>
      </body>

          <center>
    <form action="F_Time.php?userid=<?php echo $_GET['userid'];?>&id=<?php echo $_GET['id'];?>" method="get">
              
                <button type="submit" name="b1" class="btn btn-success btn-flat"  value="Start-Lunch" 
                  <?php 
                          if($timeout != '0000-00-00 00:00:00')
                          {
                            ?> enabled <?php
                          }

                         else if(!empty($id) && $breakin == '0000-00-00 00:00:00'){
                              $stat = 'Start Lunch Break';
                            }
                            else if(!empty($id)  && $breakin != '0000-00-00 00:00:00' && $breakout == '0000-00-00 00:00:00'){
                              $stat = 'End Lunch Break';
                            }
                            else
                            {
                              ?> disabled <?php
                            }
                          ?> >
                  <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $stat ; ?>
                </button>

                &nbsp;
                 <button type="submit" class="btn btn-danger btn-flat" name ="b2" id ="b2"
                         value="Time-Out" 
                         <?php 
                         if(!empty($id) || $breakin == '0000-00-00 00:00:00' && $timeout == '0000-00-00 00:00:00')
                            {?>enabled
                          <?php }
                          else
                          {
                            ?>
                            disabled<?php
                          }
                          ?> >
                  <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $stat = 'Time-Out'; ?>
                </button>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
              </form>
          </center>   
        <br>
    </div>


        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title text-blue">Your Time Record, <b><?php $today = date("l F j, Y");
              echo $today; ?></b></h3>      
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                  <?php
                      $result = mysqli_query($con, "SELECT DATE_FORMAT(`Time_In`,'%r'),
                          DATE_FORMAT(`Break_In`,'%r'),
                          DATE_FORMAT(`Break_Out`,'%r'),
                          DATE_FORMAT(`Time_Out`,'%r'),
                          `ID` 
                          FROM `time` 
                          WHERE `User_ID` = '$userid' AND DATE(`Time_In`) = CURDATE() 
                          ORDER BY `Time_In` DESC 
                          LIMIT 1");
                      $yes = mysqli_num_rows($result);

                      if($yes >= 1){
                    ?>

                  <table id = "myTable"class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Time-In</th>
                        <th>Break-In</th>
                        <th>Break-Out</th>
                        <th>Time-Out</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                        while($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>                        
                        <td>
                          <?php

                            $timeid = $row[4];

                            if($row[0] != '12:00:00 AM')
                            {
                              echo $row[0];
                            }
                            else
                            {
                              echo "...";
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($row[1] != '12:00:00 AM')
                            {
                              echo $row[1];
                            }
                            else
                            {
                              echo "...";
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($row[2] != '12:00:00 AM')
                            {
                              echo $row[2];
                            }
                            else
                            {
                              echo "...";
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($row[3] != '12:00:00 AM')
                            {
                              echo $row[3];
                            }
                            else
                            {
                              echo "...";
                            }
                          }?>
                        </td>
                      </tr>
                    <?php
                }
                else
                {
                  echo '<center><h1>Please Time In First.</h1>';
                }
                 ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->              
          </div>
        </div>
        <!-- ./ end of div row-->


        <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title text-blue">System Logs</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT Login_Time, Logout_Time FROM log WHERE `user_id` = '$userid' ORDER BY Login_Time DESC LIMIT 10");
                      $yes = mysqli_num_rows($result);

                      if($yes >= 1){
                    ?>
                  <table id = "myTable"class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Time of Log-In</th>
                      <th>Time of Log-Out</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                        while($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>                        
                        <td><?php echo $row[0] ?></td>
                        <td><?php
                          if($row[1] != '0000-00-00 00:00:00')
                          {
                            echo $row[1];
                          }
                          else
                          {
                            echo "Currently Logged In.";
                          }
                        }
                         ?></td>
                      </tr>
                    <?php
                }
                else
                {
                  echo '<center><h1>No Latest Registration yet!</h1></center><br>';
                }
                 ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->              
            </div>
          </div>

           <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title text-blue">Attendance Logs</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                  <?php
                  $sql="SELECT 
                      `date`, `Status`
                      from `Attendance` where `Emp_ID` = $userid";
                    $result = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($result);
                    ?>
                  <table id = "myTable"class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                      while($row = mysqli_fetch_array($result)){
                       ?>
                      <tr>      
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo date("l", strtotime($row[0])); ?></td>
                        <td><?php 
                          $status= $row[1];
                          if ($gender == 1)
                          { echo 'On-Time';}
                          if ($gender == 2)
                          { echo 'Late';}
                          if ($gender == 3)
                          { echo 'AWOL';}
                          if ($gender == 4)
                          { echo 'Half-Day';}
                          if ($gender == 5)
                          { echo 'On Leave';}
                          if ($gender == 6)
                          { echo 'Suspended';}
                          else
                          { echo 'Get Schedule';}

                        ?></td>
                      </tr>
                    <?php }
                   ?>  
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->              
            </div>
          </div>

    </section>
    <!-- /.content -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

         
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

   
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  <?php require ("S_Footer.php");?>
</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
