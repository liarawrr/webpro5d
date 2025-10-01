<?php
include 'config/conn_db.php';

$sql = "SELECT id, name, description, price, created FROM products";
$result = $conn->query($sql);

echo "<a href='form_product.html'>Add Product</a><br>";

if ($result && $result->num_rows > 0) {
    echo "<table border=1>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Description</th>
              <th>Created</th>
              <th>Price</th>
              <th>Action</th>
            </tr>";
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["created"] . "</td>
                <td>" . $row["price"] . "</td>
                <td>
                    <a href='form_edit_product.php?id=" . $row["id"] . "'>Edit</a> | 
                    <a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm(\"Yakin mau hapus?\");\">Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results - Table is empty";
}

$conn->close();
?>
