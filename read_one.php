<?php
include 'config/conn_db.php';

$sql = "SELECT name, description, price, created FROM products WHERE id = 4";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. 
             " - Description: " . $row["description"]. 
             " - Price: " . $row["price"]. 
             " - Created: " . $row["created"]. "<br>";
    }
} else {
    echo "0 results - Data not found";
}

$conn->close();
?>