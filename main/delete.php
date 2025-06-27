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
$sql = "DELETE FROM books WHERE id=$id";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Book deleted successfully!'); window.location.href='../main/table.php';</script>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>