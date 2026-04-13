<?php
include("../backend/db.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM gallery WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<form action="../backend/update.php" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <input type="text" name="title" value="<?= $row['title']; ?>" required>

    <br><br>

    <img src="../uploads/<?= $row['image']; ?>" width="100"><br><br>

    <input type="file" name="image">

    <br><br>

    <button type="submit">Update</button>

</form>