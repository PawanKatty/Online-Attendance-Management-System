<?php
session_start();

//currentDate();
//connecting server
$link = mysqli_connect("localhost","root","","attendance");
//for checking whether connection is establised or not.
if(mysqli_connect_errno()){
    print_r(mysqli_connect_error());
    exit();
 }

if($_GET['functions']== "logout"){
    session_unset();
    header("Location: index.php");
} 


//function currentDate(){
//    $date = new DateTime(null, new DateTimezone("Asia/Kolkata"));
//    echo $date->format('d/m/y').'<br/>';
//}
?>