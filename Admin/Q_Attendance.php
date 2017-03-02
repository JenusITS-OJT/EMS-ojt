<!DOCTYPE html>
<html>
<?php require('F_Connection.php') ?>
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
    <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition sidebar-mini">
<?php require('S_Header.php');?>
<?php require('S_Sidebar.php');?>
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Queries
          <small>| Attendance </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Attendance</li>
        </ol>
      </section>
      <br>
    <!-- Main content -->
      <section class="content">
        <!-- Info boxes --><!-- 
        <div class="row"> -->
      <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"> Attendance </h3>
             </div>

          <div class="box-body">
            <div id="example1_wrappper" class="dataTables_wrapper form-inline">
                <div class="row">
                  <div class="col-sm-9">
                    <div class="dataTables_Lenght" id="example1_length">
                      <label> Show 

                      <select name="example1_lenght" aria-controls=" example1" class="form-control input-sm">
                      <option value="-1">All</option>
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      </select> entries
                      <!-- <script jQuery('#example1').dataTable({
                       oLanguage: {sLengthMenu: <select name="example1_lenght" aria-controls=" example1" class="form-control input-sm">
                         <option value="-1">All</option>
                         <option value="10">10</option>
                         <option value="25">25</option>
                         <option value="50">50</option>
                         <option value="100">100</option>
                        </select>},
                        "iDisplayLength":100
                         entries
                         }); >
                         </script> -->
                      </label>
                    </div>
                  </div>
                </div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                     <th>Employee Name</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Shift</th>
                    <th>Time-In</th>
                    <th>Time-Out</th>
                    <th>Hours</th>
                    <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $sql="SELECT
                      CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) as name,
                      DATE_FORMAT(s.`DATE`,'%M %d, %Y'), 
                      DATE_FORMAT(s.`DATE`,'%W'),
                      DATE_FORMAT(s.`Starting_Time`,'%r'),
                      DATE_FORMAT(s.`Time_Out`,'%r'),
                      DATE_FORMAT(t.`Time_In`,'%r'),
                      DATE_FORMAT(t.`Time_Out`,'%r'),
                      TIMEDIFF( t.`Time_Out`, t.`Time_In`),
                      s.`Status`
                    FROM `schedule` AS s
                    INNER JOIN `employee` AS e
                    ON s.`Emp_ID` = e.`User_ID` 
                    LEFT JOIN `time` AS t
                    ON s.`Emp_ID` = t.`User_ID` AND DATE_FORMAT(s.`DATE`,'%M %d, %Y') = DATE_FORMAT(t.`Time_In`,'%M %d, %Y')
                    WHERE DATE_FORMAT(s.`DATE`,'%M %d, %Y') = DATE_FORMAT(NOW(),'%M %d, %Y') AND s.`ID` NOT IN (SELECT `Schedule_ID` FROM `attendance`)
                    ORDER BY name";
                     $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                      <tr>  
                     <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?> - <?php echo $row[4] ?></td>
                    <td><?php if($row[5] == null)
                    {
                      echo ("No time in yet!");
                    }
                    else
                    {
                      echo $row[5];
                    }

                    ?></td>
                    <td><?php if($row[6] == null)
                    {
                      echo ("No time out yet!");
                    }
                    else
                    {
                      echo $row[6];
                    } ?></td>
                    <td><?php if($row[5] == null)
                    {
                      echo ("No Number of Hours yet!");
                    }
                    else
                    {
                      echo $row[7];
                    } ?></td>
                    <td><?php if ($row[8] == 1)
                              echo "Active";
                            else 
                              echo "Inactive";
                            ?></td>
                      </tr>
                       <?php } ?>  
                    </tbody>
                  </table>
                  <div class="row">
                  <div class="col-md-3">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      <ul class="pagination">
                       <li class="paginate_button previous disable" id="example1_previous">
                        <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                        </li>
                        <li class="paginate_button previous disable" id="example1_previous">
                        <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                        </li>
                        <li class="paginate_button previous disable" id="example1_previous">
                        <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
                        </li>
                        <li class="paginate_button previous disable" id="example1_previous">
                        <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
                        </li>
                        <li class="paginate_button next" id="example1_next">
                        <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">Next</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
              <!--div box-body-->
<!-- 
                  
                    <div class="box box-footer ">
                    <div class="col-md-12 pull-right">
                    <div class="dataTables_Paginate paging_simple_numbers" id="logpaginate">
                      <ul class="pagination">
                        <li class="pagiinate_button previous disable" id="previous">
                          <a href="#" data-dt-idx="0" tab-index="0">Previous</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="1">
                          <a href="#" data-dt-idx="0" tab-index="1">1</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="2">
                          <a href="#" data-dt-idx="0" tab-index="2">2</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="3">
                          <a href="#" data-dt-idx="0" tab-index="3">3</a>
                        </li>
                         <li class="pagiinate_button previous disable" id="next">
                          <a href="#" data-dt-idx="0" tab-index="4">Next</a>
                        </li>

                      </ul>
                    </div>
                    </div>
                    </div> -->
        </div>
        <!-- div box -->
        <!-- </div> -->
        <!--div row-->
      </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
<?php require('S_Footer.php');?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>

  $(function () {
    $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
