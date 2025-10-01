<?php
// create connection
include "config/conn_db.php";

//delete record on table products
$sql = "DELETE from products WHERE id=$_GET[id]";
if ($conn->query($sql) === TRUE) {
// echo "New record created successfully";
// langsung menampilkan data tabel produk
header('Location: read_table_view.php');
}
?>
