<?php

mysql_connect("localhost", "root", "")or die(mysql_error());
mysql_select_db('dbci_tutorial');

$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$student_roll_no = $_POST['student_roll_no'];
$student_class = $_POST['student_class'];

if (isset($student_id)) {
    echo "update student set name='$student_name',rollno='$student_roll_no',class='$student_class' where id='$student_id'";
    mysql_query("update student set name='$student_name',rollno='$student_roll_no',class='$student_class' where id='$student_id'");
} else {


    echo "INSERT INTO student(name,rollno,class)VALUES('$student_name',$student_roll_no,'$student_class')";
    $abc = mysql_query("INSERT INTO student(name,rollno,class)VALUES('$student_name','$student_roll_no','$student_class')");
}
?>