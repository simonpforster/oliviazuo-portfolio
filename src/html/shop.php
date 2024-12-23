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

    <?php require "../components/config.php"; ?>
    <script src="./resources/js/image.js" type="module"></script>
    <script src="./resources/js/solid-gallery.js" type="module"></script>

    <?php require "../components/gallery.php"; ?>

</head>
<body>
<?php include "../components/modal.php"; ?>
<div id="screen">
    <?php include "../components/header.php"; ?>
</div>
<div id="offscreen">
    <div class="column-container">
        <div class="section">
            <div class="desktop-25 empty">
            </div>
            <div class="desktop-1-2 text">
                <div class="text">
                    <div>
                        Rerendered Memories available to order soon. Join the mailing list to be the first to know when it'll be available!
                    </div>
                    <div class="spacing" style="height: 1.5rem;"></div>
                    <form style="outline-style: solid; padding: 1rem;">
                        <div><Email: <input type="email" style=""></div><br>
                        <div>
                            <input type="checkbox">
                             Tick this box to receive an email when the book will be available. You can opt out at any time.
                        </div><br>
                        <input type="submit" value="Sign me up">
                    </form>
                </div>
            </div>
            <div class="desktop-25 empty"></div>
        </div>
    </div>
</div>
<?php include "../components/footer.php"; ?>
</body>
</html>
