<?php
include '../../db/db.php';
mysqli_query($con,"CREATE DATABASE eventribe");
mysqli_select_db($con,'eventribe');
if (mysqli_query($con,"CREATE TABLE udaan (
    ID int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    course varchar(255),
    dept varchar(10),
    phone varchar(10),
    specialisation varchar(255),
    email varchar(255),
    collegeid varchar(10),
    admission_number varchar(10),
    hostel varchar(255),
    address varchar(20),
    photograph varchar(10)
)")) {
    # code...
echo "udaan";
}
$name = $_POST['name'];
$course = $_POST['course'];
$dept = $_POST['dept'];
$phone = $_POST['phone'];
$specialisation = $_POST['specialisation'];
$email = $_POST['email'];
$collegeid = $_POST['collegeid'];
$admission_number = $_POST['admission_number'];
$hostel = $_POST['hostel'];
// $photograph = $_POST['photograph'];
$address = $_POST['address'];
$submit = $_POST['submit'];

$email = stripcslashes($email);
$email = mysqli_real_escape_string($con,$email);

// $username = stripcslashes($username);
// $username = mysqli_real_escape_string($con,$username);

$result = mysqli_query($con,"select * from udaan where email = '$email'") or die("failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);

if($row['email'] == $email) {
    echo '<script type ="text/javascript"> alert("This email is already registered \n Please try with a different email");window.location= "../index.html"</script>';
    die();
}elseif (($row['email'] !== $email)) {
    if (isset($submit)) {
        // echo "<pre>", print_r($_POST),"</pre>";
        // echo "<pre>", print_r($_FILES),"</pre>";
        // echo "<pre>", print_r($_FILES['photograph']),"</pre>";
        echo "<pre>", print_r($_FILES['photograph']['name']),"</pre>";
        //  $product_names = md5(time(). mt_rand(1,99));
        $profileImageName = $email . '_' . $_FILES['photograph']['name'];

        $path = 'assets/'. $email .'/photograph/';
        if (!file_exists($path)) {
            # code...
            mkdir($path, 0777,true);
        }else{
            $files = glob($path.'/*'); 
            // Deleting all the files in the list 
            foreach($files as $file){ 
                if(is_file($file)) 
            // Delete the given file 
            unlink($file); 
        }
} 

         $target = 'assets/'. $email .'/photograph/'. $profileImageName;
                 
        
        move_uploaded_file($_FILES['photograph']['tmp_name'], $target);



    // code...
   $query = mysqli_query($con," insert into udaan (name, course, dept, phone, specialisation, email, collegeid, admission_number, hostel, address, photograph) 
values ('$name', '$course', '$dept', '$phone', '$specialisation', '$email', '$collegeid', '$admission_number', '$hostel', '$address', '$profileImageName')");
  
echo '<script type ="text/javascript"> alert("Registered Successfully");window.location= "../index.html"</script>';
    }
}else {
    // code...
    echo '<script type ="text/javascript"> alert("Something went wrong !! Please try again");window.location= "../index.html"</script>';
}



// $query = mysqli_query($con," insert into udaan (name, course, dept, phone, specialisation, email, collegeid, admission_number, hostel, address, photograph) 
// values ('$name', '$course', '$dept', '$phone', '$specialisation', '$email', '$collegeid', '$admission_number', '$hostel', '$address', '$profileImageName')");
  
// echo '<script type ="text/javascript"> alert("Registered Successfully");window.location= "../index.html"</script>';
 ?>