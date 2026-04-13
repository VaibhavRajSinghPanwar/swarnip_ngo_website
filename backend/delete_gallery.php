<?php
include "db.php";

$id = $_GET['id'];

// पहले image name निकालो
$sql = "SELECT * FROM gallery WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// image delete from folder
unlink("../uploads/".$row['image']);

// delete from database
mysqli_query($conn, "DELETE FROM gallery WHERE id=$id");

// वापस dashboard
header("Location: ../admin/dashboard.php");
?>