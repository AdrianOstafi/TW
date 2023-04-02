<?php

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$ShoeSize = $_POST['ShoeSize'];
$Gender = $_POST['Gender'];
$EmailAddress = $_POST['EmailAddress'];

//create DataBase
$conn = new mysqli('localhost','root','','registration');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(FirstName, LastName, Gender, EmailAddress, ShoeSize) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $FirstName, $LastName, $Gender, $EmailAddress, $ShoeSize);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>


