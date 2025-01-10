<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO - SHOP</title>
    <meta name=description content="Olivia Zuo's shop.">

    <link rel="icon" type="image/x-icon"
        href="https://image-resizer.simonpforster.com/oliviazuo-portfolio/elements/element-pink.png?width=480">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/modal.css">
    <link rel="stylesheet" href="./resources/styles/section.css">
    <link rel="stylesheet" href="./resources/styles/page/shop.css">
    <link rel="stylesheet" href="./resources/styles/gallery-slider.css">
    <link rel="stylesheet" href="./resources/styles/grids.css">
    <link rel="stylesheet" href="./resources/styles/products.css">

    <?php
    require_once "../components/config.php";
    jsConfig();
    ?>
    <script src="./resources/js/image.js" type="module"></script>
    <?php require_once __DIR__ . "/../components/image.php"; ?>
    <?php
    require_once __DIR__ . "/../components/gallery.php";
    galleryScript();
    ?></head>
<body>
<?php include "../components/modal.php"; ?>
<div id="screen">
    <?php include "../components/header.php"; ?>
</div>
<div id="offscreen">
    <div class="column-container">
        <div class="section">
            <div class="desktop-25 empty">
                SHOP STILL WIP<br>
                SHOPPING CART:
            </div>
            <div class="desktop-1-2 text">
                <div id="products">
                    <?php if (Config::get()->shopOpen == "true") {
                        require "../components/shop/products.php";
                    } else {
                        echo "Shop is closed.";
                    } ?>
                </div>
            </div>
            <div class="desktop-25 empty"></div>
        </div>
    </div>
</div>
<?php include "../components/footer.php"; ?>
</body>
</html>
