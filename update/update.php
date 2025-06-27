<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$bookName = $_POST['bookName'];
$author = $_POST['author'];
$bookType = $_POST['bookType'];
$description = $_POST['description'];

$sql = "UPDATE books SET 
        book_name='$bookName',
        author='$author',
        book_type='$bookType',
        description='$description'
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Success</title>
    <link rel="stylesheet" href="update.css" />
    <script>
      setTimeout(function(){
        window.location.href="../main/table.php";
      }, 2500);
    </script>
  </head>
  <body>
    <div class="success-box">
      <h2>✅ Book Updated Successfully!</h2>
      <p>Redirecting to book list...</p>
    </div>
  </body>
  </html>';
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
