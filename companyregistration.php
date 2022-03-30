<?php

$company_name=$_POST['company_name'];
$field=$_POST['field'];
$address=$_POST['address'];
$company_contact=$_POST['company_contact'];
$HRhead=$_POST['HRhead'];
$HRphone=$_POST['HRphone'];
$website=$_POST['website'];
$email=$_POST['email'];
$password=$_POST['password'];


 $con= new mysqli('localhost','root','123','careernextgen');
if($con->connect_error){
    die("Connection failed");
}

else{

    $stme = "select * from companies where email='$email'";
    $result=mysqli_query($con,$stme);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "Already registered";

    }
    else{
        $stmt=$con->prepare("insert into companies(company_name,field,address,company_contact,HRhead,HRphone,website,email,password)
        values('$company_name','$field','$address','$company_contact','$HRhead','$HRphone','$website','$email','$password')");
    
        $stmt->execute();
        echo "Registration Successful";
    //    header('location: home.html');


        $stmt->close();
        $con->close();
    }
   

}


?>