<?php
$insert=false;
if(isset($_POST['name'])){
    //Set connection variables
    $server="localhost";
    $username="*hidden due to privacy reasons*";
    $password="*hidden due to privacy reasons*";
    $dbname="manishti_trip";
    // Create a connection
    $con=mysqli_connect($server,$username,$password,$dbname);
    // Check for connection success
    if (!$con) {
        # code...
        $insert=true;
        die("Connection to this database failed due to". mysqli_connect_error());
    }
    // echo "Success connecting to db";   
    // Collect post variables    
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $age= $_POST['age'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $desc= $_POST['desc'];
    $sql="INSERT INTO `manishti_trip` . `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;
    // Execute the query
    if($con->query($sql)==true){
        // echo "Successfully inserted";
        // Flag for successful insertion
        $insert= true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    // Close the db connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
</head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<!-- <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet"> -->
<link rel="stylesheet" href="style.css">
<body>
    <div class="container">
        <h1>Welcome to SIT Tumkur Bangalore Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert==true){
        echo "<p class='submitmsg'>Thanks for submitting your form.We are happy to see on board for the trip</p>
