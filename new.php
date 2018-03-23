<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



<script type="text/javascript">
// $(document).ready(function(){

function insertData() {

    student_name = $("#student_name").val();
    student_roll_no = $("#student_roll_no").val();
    student_class = $("#student_class").val();

    // AJAX code to send data to php file.
    $.ajax({
        type: "POST",
        url: "insert-data.php",
        data: {student_name: student_name, student_roll_no: student_roll_no, student_class: student_class},
        success: function (data) {
            $('#myModal').modal('hide');
            alert("done");
        },
        error: function (data) {
            alert("not inserted");
        }
    });

}
;

function updateData() {
    student_id = $("#st_id").val();
    student_name = $("#st_name").val();
    student_roll_no = $("#st_roll_no").val();
    student_class = $("#st_class").val();

    // AJAX code to send data to php file.
    $.ajax({
        type: "POST",
        url: "insert-data.php",
        data: {student_id: student_id, student_name: student_name, student_roll_no: student_roll_no, student_class: student_class},
        success: function (data) {
            $('#updateModal').modal('hide');
            alert("done");
        },
        error: function (data) {
            alert("not updated");
        }
    });

}
;

function DeleteData() {
    student_id = $("#delete").val();
    // student_name = $("#st_name").val();
    // student_roll_no = $("#st_roll_no").val();
    // student_class = $("#st_class").val();

    // AJAX code to send data to php file.
    $.ajax({
        type: "POST",
        url: "delete-data.php",
        data: {student_id: student_id},
        success: function (data) {
            //$('#updateModal').modal('hide');
            alert("done");
        },
        error: function (data) {
            alert("not updated");
        }
    });

}
;



$(document).on("click", '#edit', function (e) {

    var id = $(this).data('id');
    var name = $(this).data('name');
    var st_class = $(this).data('class');
    var rollno = $(this).data('rollno');

    $("#st_id").val(id);
    $("#st_name").val(name);
    $("#st_roll_no").val(rollno);
    $("#st_class").val(st_class);

});
// });
</script>





<div class="container">
<h2>Open Popup</h2>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Record</h4>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</div>

</br>


<!-- Show data and update reord -->























<table class="table table-striped table-bordered table-hover display Responsive" id="example"  width="100%" cellspacing="0">
<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Class</th>
        <th>Roll Number</th>
        <th>Action</th>
    </tr>
</thead>
<?php
mysql_connect("localhost", "root", "")or die(mysql_error());
mysql_select_db('dbci_tutorial');



$result = mysql_query("select * from student");
?>

<tbody>
<?php while ($row = mysql_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row["rollno"]; ?></td>
            <td> <button type="button"  id='edit' class="btn btn-info btn-lg" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-rollno="<?php echo $row['rollno']; ?>" data-class="<?php echo $row['class']; ?>" data-name="<?php echo $row['name']; ?>" data-target="#updateModal">Edit</button>
            </td><td><button class="btn btn-danger btn-block" id='delete' value="<?php echo $row['id']; ?>" onclick="DeleteData()">Delete</button>
            </td>
        </tr>
<?php } ?>
</tbody>
</table>



<script type="text/javascript">
$(document).ready(function () {
    $('#example').DataTable();
});
</script>



<div class="container">

<!-- Modal -->
<div class="modal fade" id="updateModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Record</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">
                            <form id="loginForm" method="" action="" novalidate="novalidate">
                                <input type="text" class="form-control" id="st_id">
                                <div class="form-group">
                                    <label for="student_name" class="control-label">Enter Name</label>
                                    <input type="text" class="form-control" id="st_name" name="student_name" value="" required="" title="Please enter you Name" placeholder="">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="student_roll_no" class="control-label">Enter Roll No</label>
                                    <input type="text" class="form-control" id="st_roll_no" name="student_roll_no" value="" required="" title="Please enter your Roll No">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="student_class" class="control-label">Enter Class</label>
                                    <input type="text" class="form-control" id="st_class" name="student_class" value="" required="" title="Please enter your Class">
                                    <span class="help-block"></span>
                                </div>


                                <button type="button" class="btn btn-success btn-block" name="insert-data" id="insert-data" onclick="updateData()">Update Data</button>
                                <br>
                                <p id="message"></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</div>