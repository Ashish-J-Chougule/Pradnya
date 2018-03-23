<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$con= new mysqli('localhost','root','','dbci_tutorial');
var_dump($con);
if($con==FALSE)
{
    //echo "connction failed";
}
 else {
//echo "concted";    
}
$query="select * from student";
$result=$con->query($query);
while($row=  mysqli_fetch_array($result))
{
    //print_r($row);
}
echo "<pre>"; 
//print_r($_COOKIE);
$zip=
$zip=  zip_open("attachments.zip");
var_dump($zip);
print_r($zip);