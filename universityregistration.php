<?php

// session_start();

$university_name=$_POST['university_name'];
$university_address=$_POST['university_address'];
$university_email=$_POST['university_email'];
$university_contactnum=$_POST['university_contactnum'];
$carerguidanceHead=$_POST['carerguidanceHead'];
$carerguidanceNumber=$_POST['carerguidanceNumber'];
$password=$_POST['password'];


 $con= new mysqli('localhost','root','123','careernextgen');
if($con->connect_error){
    die("Connection failed");
}

else{

    $s = "select * from universities where university_email='$university_email'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "Already registered";

    }
    else{
        $stmt=$con->prepare("insert into universities(university_name,university_address,university_email,university_contactnum,carerguidanceHead,carerguidanceNumber,password)
        values('$university_name','$university_address','$university_email','$university_contactnum','$carerguidanceHead','$carerguidanceNumber','$password')");
    
        $stmt->execute();
        echo "Registration Successful";
    //    header('location: home.html');


        $stmt->close();
        $con->close();
    }
   

}

?>

