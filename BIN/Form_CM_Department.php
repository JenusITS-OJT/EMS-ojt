<!-- Modal Branch-->
<form method="POST" action="_CM_Department.php">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="form">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Department</h4>
      </div>
      <div class="modal-body">
        
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Department Name</label>
                <input class="form-control" id="address" name="address" placeholder="Department Name" required/>
              </div>
            </div>
                      
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input class="form-control" id="description" name="description" placeholder="Department Function/s" required></textarea>
          </div>
        </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" id="status" name="status" placeholder="Status" required>
                            <?php $sql="SELECT
                              s.`ID`, s.`Status_Name`
                            FROM `status` as s where s.`id` = '1' or s.`id` = '8'";
                              $result = mysqli_query($con, $sql);
                              while($row = mysqli_fetch_array($result)){
                            ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                  </select>
              </div>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>