<?php
require "database.php";
require "product.php";

$singleton = ShopDb::get();
$conn = $singleton->db->connect();
$data = $conn->query("SELECT * FROM products")->fetchArray();

foreach ($data as &$row) {
    $prod = new Product(
        $row["id"],
        $row["name"],
        $row["description"],
        $row["price"],
        $row["image"]
    );

    echo $prod->render();
}
