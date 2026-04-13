<?php
include("db.php");

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/".$image);

    $sql = "INSERT INTO gallery (title, description, image) 
            VALUES ('$title', '$description', '$image')";

    mysqli_query($conn, $sql);

    header("Location: ../admin/dashboard.php?success=1");
}
?>