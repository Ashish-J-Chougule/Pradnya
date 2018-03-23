<?php

mysql_connect("localhost", "root", "")or die(mysql_error());
mysql_select_db('dbci_tutorial');

echo $student_id = $_POST['student_id'];

if (isset($student_id)) {
    echo $delete_query = "delete from student where id='$student_id'";
    mysql_query($delete_query);
}
?>