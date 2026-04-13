<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "swarnim_ngodb";

$conn = mysqli_connect("localhost", "root", "", "swarnim_ngodb");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>