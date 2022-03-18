<?php

// session_start();

$name=$_POST['name'];
$email=$_POST['email'];
$category=$_POST['category'];
$institute=$_POST['institute'];
$password=$_POST['password'];


 $con= new mysqli('localhost','root','123','careernextgen');
if($con->connect_error){
    die("Connection failed");
}

else{

    $s = "select * from students where email='$email'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "Already registered";

    }
    else{
        $stmt=$con->prepare("insert into students(name,email,category,institute,password)
        values('$name','$email','$category','$institute','$password')");
    
        $stmt->execute();
        // echo "Registration Successful";
       header('location: home.html');


        $stmt->close();
        $con->close();
    }
   

}

?>

