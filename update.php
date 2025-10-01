<?php
// new data ti insert

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prodId = _POST['id'] ?? '';
    $prodName  = $_POST['name'] ?? '';
    $prodDesc  = $_POST['description'] ?? '';
    $prodPrice = $_POST['price'] ?? 0;

    include "config/conn_db.php";
}

    if (!empty($prodName) && !empty($prodDesc) && $prodPrice > 0) {
        $prodPrice = floatval($prodPrice);

        $sql = "UPDATE products SET name = '$prodName', description = '$prodDesc', price = $prodPrice WHERE id=$prodId";
    }
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
