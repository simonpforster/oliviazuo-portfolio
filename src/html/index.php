<?php

$request = $_SERVER["REQUEST_URI"];
switch ($request) {
    case "/":
    case "": // you can combine the cases '/' and ''
        require __DIR__ . "/../views/main.php";
        break;
    case "/personal":
        require __DIR__ . "/../views/personal.php";
        break;
    case "/commercial":
        require __DIR__ . "/../views/commercial.php";
        break;
    case "/shop":
        require __DIR__ . "/../views/shop.php";
        break;
    default:
        http_response_code(404);
        require __DIR__ . "/../views/404.php";
        break;
}
