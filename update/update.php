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
    <style>
      body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        overflow: hidden;
        position: relative;
      }

      #vanta-bg {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1;
      }

      .success-box {
        background-color: #e6ffee;
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        text-align: center;
        border: 2px solid #28a745;
        color: #155724;
        z-index: 1;
      }

      .success-box h2 {
        color: #28a745;
        margin-bottom: 10px;
      }

      .success-box p {
        color: #155724;
      }
    </style>
    <script>
      setTimeout(function(){
        window.location.href="../main/table.php";
      }, 2500);
    </script>
  </head>
  <body>
    <div id="vanta-bg"></div>
    <div class="success-box">
      <h2>✅ Book Updated Successfully!</h2>
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
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
