<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO - SHOP</title>
    <meta name=description content="Olivia Zuo's shop.">

    <link rel="icon" type="image/x-icon"
          href="https://image-resizer.simonpforster.com/oliviazuo-portfolio/elements/element-pink.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/modal.css">
    <link rel="stylesheet" href="./resources/styles/section.css">
    <link rel="stylesheet" href="./resources/styles/page/shop.css">
    <link rel="stylesheet" href="./resources/styles/gallery-slider.css">
    <link rel="stylesheet" href="./resources/styles/grids-min.css">
    <link rel="stylesheet" href="./resources/styles/custom-grids-min.css">

    <script src="./resources/js/image.js" type="module"></script>
    <script src="./resources/js/solid-gallery.js" type="module"></script>
    <script src="./resources/js/checkout.js" type="module"></script>


    <script src="https://js.stripe.com/v3/"></script>

    <?php require "components/gallery.php"; ?>

</head>
<body>
<?php include "components/modal.php"; ?>
<div id="screen">
    <?php include "components/header.php"; ?>
</div>
<div id="offscreen">
    <div class="column-container">
        <div id="express-checkout-element">
        <!-- Express Checkout Element will be inserted here -->
        </div>
        <div id="error-message">
        <!-- Display an error message to your customers here -->
        </div>
    </div>
</div>
<?php include "components/footer.php"; ?>
</body>
</html>
