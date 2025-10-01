<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prodName  = $_POST['name'] ?? '';
    $prodDesc  = $_POST['description'] ?? '';
    $prodPrice = $_POST['price'] ?? 0;

    include "config/conn_db.php";

    if (!empty($prodName) && !empty($prodDesc) && $prodPrice > 0) {
        $prodPrice = floatval($prodPrice);

        $sql = "INSERT INTO products(name, description, price)
                VALUES ('$prodName', '$prodDesc', $prodPrice)";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            // langsung menampilkan data tabel produk
            header('Location: read_table_view.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
