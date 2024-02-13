<?php

session_start();

require_once '../config/config.php';


$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$msg = $_POST['msg'];
$listedUser = $_POST['listedUser'];
$propertyID = $_POST['propertyID'];

$createMsgQuery = "INSERT INTO msg(`listedUser`, `msg`, `userEmail`, `userContact`, `userName`, `propertyID`) VALUES('$listedUser', '$msg', '$email', '$contact', '$name', '$propertyID')";
$createMsg = $conn->query($createMsgQuery);

if($createMsg === TRUE){

    
    header("Location: ../pages/property.php?property-id=$propertyID&success=<i class='fa-solid fa-circle-check'></i> Your message was sent to the owner");
    exit(); 
}


$conn->close();
?>