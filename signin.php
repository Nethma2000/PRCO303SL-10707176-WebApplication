<?php

session_start();

$con= new mysqli('localhost','root','123','careernextgen');

$email=$_POST['email'];
$password=$_POST['password'];

$s = "select * from students where email='$email' && password='$password'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    header('location: adminlogin.html');
}
else{
    echo "Invalid Email or Password";
}

?>