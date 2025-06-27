<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>📚 Book Info</title>
  <link rel="stylesheet" href="table.css">
</head>

<body>
  <div class="book-container">
    <div class="header">
      <h2>📖 Book Information</h2>
      <a href="../form/form.php" class="btn-add">➕ Add Book</a>
    </div>

    <div class="table-section">
      <table class="book-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Book Type</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><strong><?= $row['book_id']; ?></strong></td>
                <td><?= $row['book_name']; ?></td>
                <td><?= $row['author']; ?></td>
                <td><?= $row['book_type']; ?></td>
                <td><?= $row['description']; ?></td>
                <td>
                  <a href="../edit/edit.php?id=<?= $row['id']; ?>" class="btn-edit">✏️ Edit</a>
                  <a href="delete.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?');">🗑️ Delete</a>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="6">No books found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>

</body>

</html>
<?php $conn->close(); ?>