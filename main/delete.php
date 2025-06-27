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
  echo '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Book Deleted</title>
    <link rel="stylesheet" href="table.css" />
    <script>
      setTimeout(function(){
        window.location.href="../main/table.php";
      }, 1500);
    </script>
  </head>
  <body>
    <div id="vanta-bg"></div>
    <div class="delete-box">
      <h2>Book Deleted Successfully!</h2>
      <p>Redirecting to book list...</p>
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
  </html>';
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
