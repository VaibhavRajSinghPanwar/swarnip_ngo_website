<?php
include "db.php";

$sql = "SELECT * FROM gallery ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='gallery-item'>
        <img src='../uploads/".$row['image']."'>
        <h4>".$row['title']."</h4>
    </div>
    ";
}
?>