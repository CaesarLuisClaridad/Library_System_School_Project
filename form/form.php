<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "library";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get form values
  $bookName = $_POST['bookName'];
  $author = $_POST['author'];
  $bookType = $_POST['bookType'];
  $description = $_POST['description'];

  // Insert without book_id first
  $sql = "INSERT INTO books (book_name, author, book_type, description)
          VALUES ('$bookName', '$author', '$bookType', '$description')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    // Set book_id to match the id
    $updateBookId = "UPDATE books SET book_id = '$last_id' WHERE id = $last_id";
    $conn->query($updateBookId);

    echo "<script>alert('📚 Book registered successfully!'); window.location.href='../main/table.php';</script>";
    exit;
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="form.css" />
  <title>Register New Book</title>
</head>
<body>
  <div class="container">
    <h2>📚 Register New Book</h2>
    <form class="register-form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="form_group">
        <label for="bookName">Book Name</label>
        <input type="text" id="bookName" name="bookName" placeholder="Enter Book Name" required />
      </div>
      <div class="form_group">
        <label for="author">Author</label>
        <input type="text" id="author" name="author" placeholder="Enter Author Name" required />
      </div>
      <div class="form_group">
        <label for="bookType">Book Type</label>
        <input type="text" id="bookType" name="bookType" placeholder="e.g. Fiction, History" required />
      </div>
      <div class="form_group">
        <label for="description">Book Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Write a brief description..." required></textarea>
      </div>
      <button type="submit" class="submit-btn">Submit</button>
    </form>

    <div class="btn">
      <p>🔙 <a href="../main/table.php">Back to Table</a></p>
    </div>
  </div>
</body>
</html>
