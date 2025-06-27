<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "library";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $bookName = $_POST['bookName'];
  $author = $_POST['author'];
  $bookType = $_POST['bookType'];
  $description = $_POST['description'];

  $sql = "INSERT INTO books (book_name, author, book_type, description)
          VALUES ('$bookName', '$author', '$bookType', '$description')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $updateBookId = "UPDATE books SET book_id = '$last_id' WHERE id = $last_id";
    $conn->query($updateBookId);

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Book Registered</title>
      <link rel="stylesheet" href="form.css" />
      <script>
        setTimeout(function(){
          window.location.href = "../main/table.php";
        }, 1500);
      </script>
    </head>
    <body>
      <div id="vanta-bg"></div>
      <div class="success">
        <h2>Book Registered Successfully!</h2>
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register New Book</title>
  <link rel="stylesheet" href="form.css" />
</head>

<body>
  <div id="vanta-bg"></div>
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
      <p><a href="../main/table.php">Back to Table</a></p>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r125/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
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
    });
  </script>
</body>

</html>