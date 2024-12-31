<?php
require "database.php";
require "product.php";

$singleton = ShopDb::get();
$singleton->db->sync();
$conn = $singleton->db->connect();
$data = $conn->query("SELECT * FROM products")->fetchArray();

foreach ($data as &$row) {
    $prod = new Product(
        $row["id"],
        $row["name"],
        $row["description"],
        $row["price"]
    );

    echo $prod->render();
}
