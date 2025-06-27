<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="edit.css" />
  <title>Edit Book</title>
  <style>
    #vanta-bg {
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: -1;
    }
  </style>
</head>
<body>
  <div id="vanta-bg"></div>

  <div class="container">
    <h2>✏️ Edit Book</h2>
    <form class="register-form" action="../update/update.php" method="POST">
      <input type="hidden" name="id" value="<?= $row['id']; ?>" />
      
      <div class="form_group">
        <label for="bookName">Book Name</label>
        <input type="text" id="bookName" name="bookName" placeholder="Enter Book Name" value="<?= $row['book_name']; ?>" required />
      </div>
      
      <div class="form_group">
        <label for="author">Author</label>
        <input type="text" id="author" name="author" placeholder="Enter Author Name" value="<?= $row['author']; ?>" required />
      </div>
      
      <div class="form_group">
        <label for="bookType">Book Type</label>
        <input type="text" id="bookType" name="bookType" placeholder="e.g. Fiction, History" value="<?= $row['book_type']; ?>" required />
      </div>
      
      <div class="form_group">
        <label for="description">Book Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Write a brief description..." required><?= $row['description']; ?></textarea>
      </div>
      
      <button type="submit" class="submit-btn">Update</button>
    </form>
    
    <div class="btn">
      <p>Go back to <a href="../main/table.php">Table?</a></p>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r125/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
  <script>
    VANTA.WAVES({
      el: "#vanta-bg",
       mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.00,
      scaleMobile: 1.00,
      color: 0xd452f
    });
  </script>
</body>
</html>
