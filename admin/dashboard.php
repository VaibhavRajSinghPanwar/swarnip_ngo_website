<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../backend/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

/* BODY */
body{
    display:flex;
    background:#f4f6f9;
}

/* SIDEBAR */
.sidebar{
    width:220px;
    height:100vh;
    background:#111;
    color:#fff;
    padding:20px;
    position:fixed;
}

.sidebar h2{
    text-align:center;
    margin-bottom:30px;
    color:#ff6600;
}

.sidebar a{
    display:block;
    color:#fff;
    text-decoration:none;
    margin:15px 0;
    padding:10px;
    border-radius:5px;
}

.sidebar a:hover{
    background:#ff6600;
}

/* MAIN */
.main{
    margin-left:220px;
    width:100%;
    padding:30px;
}

/* HEADER */
.header{
    background:#fff;
    padding:15px 20px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

/* CARD */
.card{
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

/* FORM */
form{
    display:flex;
    flex-direction:column;
}

input{
    margin-bottom:15px;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
}

input:focus{
    border-color:#ff6600;
    outline:none;
}

/* BUTTON */
button{
    background:#ff6600;
    color:#fff;
    padding:12px;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#e65c00;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

table th, table td{
    padding:12px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

table th{
    background:#ff6600;
    color:#fff;
}

img{
    border-radius:5px;
    cursor:pointer;
}
<th>Description</th>
<td><?php echo $row['description']; ?></td>

/* SUCCESS MSG */
.success{
    background:#d4edda;
    color:#155724;
    padding:10px;
    border-radius:5px;
    margin-bottom:10px;
}

/* POPUP */
#popup{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:#000000cc;
}

#popup img{
    display:block;
    margin:5% auto;
    max-width:80%;
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="#">Dashboard</a>
    <a href="#">Add Gallery</a>
    <a href="#">Manage</a>
    <a href="logout.php">Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- HEADER -->
    <div class="header">
        <h2>Welcome, <?php echo $_SESSION['admin']; ?> 👋</h2>
    </div>

    <!-- SUCCESS MESSAGE -->
    <?php if(isset($_GET['success'])) { ?>
        <div class="success">✅ Image Uploaded Successfully</div>
    <?php } ?>

    <!-- UPLOAD -->
    <div class="card">
        <h3>📸 Upload Gallery Image</h3>

        <form action="../backend/add_gallery.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Image Title" required>
            <input type="file" name="image" required>
            <button type="submit" name="submit">Upload Image</button>
        </form>
    </div>

    <!-- GALLERY TABLE -->
    <div class="card">
        <h3>📂 Gallery Manage</h3>

        <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT * FROM gallery ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>

            <td>
                <img src="../uploads/<?php echo $row['image']; ?>" width="80"
                onclick="openImage('../uploads/<?php echo $row['image']; ?>')">
            </td>

            <td><?php echo $row['title']; ?></td>

            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="../backend/delete_gallery.php?id=<?php echo $row['id']; ?>" 
                onclick="return confirm('Delete करना है?')">Delete</a>
            </td>
        </tr>
        <?php } ?>

        </table>
    </div>

</div>

<!-- POPUP -->
<div id="popup" onclick="this.style.display='none'">
    <img id="popup-img">
</div>

<script>
function openImage(src){
    document.getElementById("popup").style.display="block";
    document.getElementById("popup-img").src=src;
}
</script>

</body>
</html>