<!-- Modal Branch Delete-->
<form method="POST" action="_CM_Branch.php">
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="form">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete this record?</h4>
      </div>

      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <?php $id = mysqli_real_escape_string($con, $_POST['id']);
            $sql="SELECT
                              b.`Address`
                            FROM `branch` AS b
                            WHERE b.`ID` = $id;";
                              $result = mysqli_query($con, $sql);
                              while($row = mysqli_fetch_array($result)){
                            ?>
            <label for="exampleInputEmail1">Branch <?php echo $row[0] ?></label>
            <textarea class="form-control" id="address" name="address" placeholder="Address Line, Street, State, Country" required/></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
        <a href='#myModal' data-myid='<?php echo $row[0] ?>'  role='button' class='btn btn-success btn-flat btn-sm editBranch' data-toggle='modal' >
                      <i class="fa fa-pencil"></i>
                      Update
                    </a>
                    <?php };?>
      </div>
      
    </div>
  </div>
</div>
</form>