<?php
include("db.php");

$id = $_POST['id'];
$title = $_POST['title'];

if(!empty($_FILES['image']['name'])){

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/" . $image);

    mysqli_query($conn, "UPDATE gallery SET title='$title', image='$image' WHERE id=$id");

}else{

    mysqli_query($conn, "UPDATE gallery SET title='$title' WHERE id=$id");
}

header("Location: ../admin/dashboard.php");
?>