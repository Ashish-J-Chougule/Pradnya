    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Insert Data in PHP jQuery AJAX</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well">
                          <form id="loginForm" method="" action="" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="student_name" class="control-label">Enter Name</label>
                                  <input type="text" class="form-control" id="student_name" name="student_name" value="" required="" title="Please enter you Name" placeholder="">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="student_roll_no" class="control-label">Enter Roll No</label>
                                  <input type="text" class="form-control" id="student_roll_no" name="student_roll_no" value="" required="" title="Please enter your Roll No">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="student_class" class="control-label">Enter Class</label>
                                  <input type="text" class="form-control" id="student_class" name="student_class" value="" required="" title="Please enter your Class">
                                  <span class="help-block"></span>
                              </div>


                              <button type="button" class="btn btn-success btn-block" name="insert-data" id="insert-data" onclick="insertData()">Insert Data</button>
                              <br>
                            <p id="message"></p>
                          </form>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>

  <?php
  if(mysql_connect('localhost','root','root'))
  {
    echo "success";
  }
  mysql_select_db('dbci_tutorial');
  ?>