<?php
include '../../db/db.php';
mysqli_query($con,"CREATE DATABASE eventribe");
mysqli_select_db($con,'eventribe');
if (mysqli_query($con,"CREATE TABLE udaaan_enterpreneurship (
    ID int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(255),
    course varchar(255),
    dept varchar(255),
    email varchar(255),
    phone varchar(255),
    que varchar(255)
)")) {
    # code...
echo "udaan";
}
$first_name = $_POST['first_name'];
$course = $_POST['course'];
$dept = $_POST['dept'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$que = $_POST['que'];
// $screenshot = $_POST['screenshot'];
$work = $_POST['post'];

$email = stripcslashes($email);
$email = mysqli_real_escape_string($con,$email);

// $username = stripcslashes($username);
// $username = mysqli_real_escape_string($con,$username);

$result = mysqli_query($con,"select * from udaaan_enterpreneurship where email = '$email'") or die("failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);

if($row['email'] == $email) {
    echo '<script type ="text/javascript"> alert("This email is already registered \n Please try with a different email");window.location= "SignUp.php"</script>';
    die();
}elseif (($row['email'] !== $email)) {
     // code...
     $query = mysqli_query($con," insert into udaaan_enterpreneurship (first_name, course, dept, email, phone, que) 
     values ('$first_name', '$course', '$dept', '$email', '$phone', '$que')");
       
     echo '<script type ="text/javascript"> alert("Registered Successfully");window.location= "index.html"</script>';
     }else {
         // code...
         echo '<script type ="text/javascript"> alert("Something went wrong !! Please try again");window.location= "index.html"</script>';
     }

 ?>