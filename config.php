<?php
$serverName = 'localhost';
$userName = 'root';
$password = 'Satalan1925$';
$db = 'petadoption';

$conn = new mysqli($serverName,$userName,$password,$db);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);}

?>