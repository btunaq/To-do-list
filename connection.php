<?php 

  
$host = "localhost";
$port = "3307"; 
$dbname = "todolist";
$user = "root";
$pass = "";

    $conn = new PDO("mysql:dbname=$dbname;host=$host;port=$port", $user, $pass);

?>