<!-- Modal Branch-->
<form method="POST" action="_CM_Hire Date.php">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="form">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Set Hire Date</h4>
      </div>
      <div class="modal-body">
        
            <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Employee ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Insert Exact Employee ID (e.g. JITSP0000x)" required>
                </div>
        </div>
        
           <!-- Date -->
           <div class="col-md-6">
              <div class="form-group">
              <label>Hired Date</label>

              <div class="input-group date">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right" id="datepicker" required></input>
              </div>
              <!-- /.input group -->
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