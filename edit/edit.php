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
</head>
<body>
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
</body>
</html>
