<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO - PERSONAL</title>
    <link rel="icon" type="image/x-icon"
          href="https://storage.googleapis.com/oliviazuo-portfolio/elements/element-cyan.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/page/personal.css">
    <link rel="stylesheet" href="./resources/styles/grids-min.css">
    <link rel="stylesheet" href="./resources/styles/custom-grids-min.css">
    <link rel="stylesheet" href="./resources/styles/gallery-slider.css">

    <script src="./resources/js/image.js" type="module"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MV5EDGJ2R9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-MV5EDGJ2R9');
    </script>
</head>
<body>

<div id="screen">
    <?php include 'components/header.php' ?>
</div>
<div id=offscreen">
    <div class="slider">
        <ul>
            <li>
                <p class="slidedesc">
                    img title
                </p>
                <img
                        path="/personal/2023/invisible-feast/appetizer.png"
                        fix="width">
            </li>
            <li>
                <p class="slidedesc">
                    img title
                </p>
                <img
                        path="/personal/2023/invisible-feast/dessert.png"
                        fix="width">
            </li>
            <li>
                <p class="slidedesc">
                    img title
                </p>
                <img
                        path="/personal/2023/invisible-feast/main-course.png"
                        fix="width">
            </li>
            <li>
                <p class="slidedesc">
                    img title
                </p>
                <img
                        path="/personal/2023/invisible-feast/salad.png"
                        fix="width">
            </li>
            <li>
                <p class="slidedesc">
                    img title
                </p>
                <img
                        path="/personal/2023/invisible-feast/staple-food.png"
                        fix="width">
            </li>
        </ul>
    </div>
</div>
<?php include 'components/footer.php' ?>
</body>
</html>