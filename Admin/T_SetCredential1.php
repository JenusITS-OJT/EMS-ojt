<!DOCTYPE html>
<?php require('F_Connection.php');
if (isset($_GET['id']))
  $id = $_GET['id'];
else
   header("Location: T_SetCredential.php");
?>
<html>
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
<?php require('S_Header.php');?>
<?php require('S_Sidebar.php');?>
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Employee Management System
          <small>| Set Credentials</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="S_Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-tasks"></i>Transaction</a></li>
          <li class="active">Set Credentials</li>
        </ol>
      </section>
      <br>
      <!-- Main content -->  
      <section class="content">

        <form action="F_T_SetCredential.php" method="get">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Set Employee's Credentials</h3>
            </div>

            <div class="box-body">
              <?php $sql="SELECT `user_ID`,
                CONCAT(`First_Name`, ' ' ,`Middle_Name`, ' ' , `Last_Name`),
                `email`, 
                `contact_no`,
                DATE_FORMAT(`Date_Acct_Created`, '%M %d, %Y %r')
                FROM `employee`
                WHERE `user_id` = $id";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result)){
                $name = $row[1];
                $email = $row[2];
                $contact = $row[3];
                $date = $row[4];
                }
              ?>

              <!-- Name -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>" readonly>
                </div>
              </div>

              <!-- Email -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value = "<?php echo $email; ?>" readonly>
                </div>
              </div>

              <!-- Contact No. -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Contact Number</label>
                  <input type="number" class="form-control" id="contact" name="contact" placeholder="Contact Number" value = "<?php echo $contact; ?>" readonly>
                </div>
              </div>              

              <!-- ID Number -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Set ID Number</label>
                  <input type="text" class="form-control" id="empid" name="empid" placeholder="ID Number (e.g. 001, 002, ...)" required>
                </div>
              </div>

              <!-- Bank Account -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Account</label>
                  <input type="text" class="form-control" id="account" name="account" placeholder="Bank Account" required>
                </div>
              </div>

              <!-- Basic Salary -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Basic Salary</label>
                  <input type="number" class="form-control" id=basicpay name="basicpay" placeholder="Basic Salary" required>
                </div>
              </div>

              <!-- Job Position -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Position</label>
                  <select class="form-control" id="pos" name="pos" required>
                    <?php $sql="SELECT `id`,
                      `job_title`
                      FROM `job`;";
                      $result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <!-- Team -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Team</label>
                  <select class="form-control" id="team" name="team" required>
                    <?php $sql="SELECT `id`,
                      `team_name`
                      FROM `team`;";
                      $result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <!-- Designation -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Designation</label>
                  <select class="form-control" id="des" name="des" required>
                    <?php $sql="SELECT `id`,
                      `address`
                      FROM `branch`;";
                      $result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <!-- Hire Date -->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Hire Date</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker" name="datepicker" required></input>
                  </div>
                </div>
              </div>

              <!-- Pay Type -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Pay Type</label>
                  <select class="form-control" id="paytype" name="paytype" required>
                    <option value="Monthly">Monthly</option>
                    <option value="Semi-Monthly">Semi-Monthly</option>                      
                  </select>
                </div>
              </div>

              <!-- Employee Type -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Employee Type</label>
                  <select class="form-control" id="emptype" name="emptype" required>
                    <option value="Regular/Permanent">Regular/Permanent</option>
                    <option value="Probationary">Probationary</option>
                    <option value="Trainee/Intern">Trainee/Intern</option>
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>"/>

            <div class="box-footer" align="right">
              <button type="submit" class="btn btn-info btn-flat">
                <i class="fa fa-save"></i>
                Save
              </button>
              &nbsp;&nbsp;&nbsp;
              <a href="T_SetCredential.php" type="button" class="btn btn-default btn-flat"">
                <i class="fa fa-remove"></i>
                Cancel
              </a>
            </div>
          </div>
        </form>
        
        <div class="box box-warning">
          <div class="box-header with border">
            <h3 class="box-title">Employees' Data</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="overflow-x:auto;">
            <?php $sql="SELECT `user_ID`,
              CONCAT(`First_Name`, ' ' ,`Middle_Name`, ' ' , `Last_Name`),
              `email`, 
              `contact_no`,
              DATE_FORMAT(`Date_Acct_Created`, '%M %d, %Y %r')
              FROM `employee` 
              WHERE `date_hired` IS NULL 
              OR `date_hired` = '0000-00-00'";
              $result = mysqli_query($con, $sql);
              $yes = mysqli_num_rows($result);
              if($yes >= 1)
              {
            ?>
            <table id="SetCredential" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Registered Date</th>
                  <th>Action</th>
                </tr>
              </thead>
                
              <tbody>
                <?php
                  while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                  <td><?php echo $row[1] ?></td>
                  <td><?php echo $row[2] ?></td>
                  <td><?php echo $row[3] ?></td>
                  <td><?php echo $row[4] ?></td>
                  <td>
                    <a href="T_SetCredential1.php?id=<?php echo $row[0]; ?>">
                      <button type="submit" class="btn btn-success btn-flat btn-sm"  value="Update">
                          <i class="fa fa-edit"></i>
                          Set Credentials
                      </button>
                    </a>
                    <a href="T_SetCredential2.php?id=<?php echo $row[0]; ?>">
                      <button type="submit" class="btn btn-danger btn-flat btn-sm"  value="Delete">
                        <i class="fa fa-trash"></i>
                        Delete
                      </button>
                    </a>
                  </td>
                </tr>
                <?php }
                  }
                  else
                  {
                    echo '<center><h1>No Latest Registration yet!</h1></center><br>';
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </section>
    </div>
  </div>
  <!-- ./wrapper -->

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
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
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
      //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );
  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  
  $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
