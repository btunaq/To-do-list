<?php


$host = "localhost";
$dbname = "todolist";
$user = "root";
$pass = "";

$conn = new PDO("mysql:dbname=$dbname;host=$host", $user, $pass);
