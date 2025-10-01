<?php
include 'config/conn_db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT id, name, description, price, created 
        FROM products 
        WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "0 results - Data not found";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Product</title>
</head>
<body>
  <h2>Add Product</h2>
  <form action="create.php" method="post">
    <label>Product Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01" required><br><br>

    <input type="submit" value="Add Product">
  </form>
</body>
</html>
  
