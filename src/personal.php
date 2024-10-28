<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO - PERSONAL</title>
    <link rel="icon" type="image/x-icon"
          href="https://storage.googleapis.com/oliviazuo-portfolio/elements/element-cyan.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/section.css">
    <link rel="stylesheet" href="./resources/styles/modal.css">
    <link rel="stylesheet" href="./resources/styles/page/personal.css">
    <link rel="stylesheet" href="./resources/styles/grids-min.css">
    <link rel="stylesheet" href="./resources/styles/custom-grids-min.css">
    <link rel="stylesheet" href="./resources/styles/gallery-slider.css">

    <script src="./resources/js/image.js" type="module"></script>
    <script src="./resources/js/solid-gallery.js" type="module"></script>

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
<?php include 'components/modal.php' ?>
<div id="screen">
    <?php include 'components/header.php' ?>
</div>
<div id="offscreen">
    <div class="column-container">
        <div class="section" id="spectral-archive">
            <div class="normal-1-2">
                <div class="gallery" id="spectral-archive-gallery" style="width: 70%; margin-left: auto;">
                    <img style="display: block;"
                         path="/personal/2023/spectral-archive/day-3-1.jpg"
                         fix="width">
                    <img path="/personal/2023/spectral-archive/day-3-2.jpg"
                         fix="width">
                    <img path="/personal/2023/spectral-archive/day-3-3.jpg"
                         fix="width">
                    <img path="/personal/2023/spectral-archive/day-6-1.jpg"
                         fix="width">
                    <img path="/personal/2023/spectral-archive/day-6-2.jpg"
                         fix="width">
                    <img path="/personal/2023/spectral-archive/day-6-3.jpg"
                         fix="width">
                </div>
            </div>
            <div class="normal-1-2">
                <figure>
                    <img path="/personal/2023/spectral-archive/archive.jpg" fix="width"
                         style="aspect-ratio: 1.15; object-fit: cover;">
                    <figcaption>
                        <div class="highlight">SPECTRAL ARCHIVE, 2023</div>
                        <div>
                            is about the process of memory reconstruction by bridging the gap between my digital and
                            physical recollections.
                        </div>
                        <div>
                            it draws upon knowledge from memory-based records-keeping, aiming to interrogate the
                            significance of archival documentation in the act of “recalling.”
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="invisible-feast">
            <div class="normal-1-2">
                <figure>
                    <img path="/personal/2023/invisible-feast/web-index.png" fix="width"
                         style="">
                    <figcaption>
                        <div class="highlight">SPECTRAL ARCHIVE, 2023</div>
                        <div>
                            is about the process of memory reconstruction by bridging the gap between my digital and
                            physical recollections.
                        </div>
                        <div>
                            it draws upon knowledge from memory-based records-keeping, aiming to interrogate the
                            significance of archival documentation in the act of “recalling.”
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="normal-1-2">
                <div class="slider shaded-sides">
                    <ul>
                        <li>
                            <img path="/personal/2023/invisible-feast/appetizer.png"
                                 fix="width">
                        </li>
                        <li>
                            <img path="/personal/2023/invisible-feast/dessert.png"
                                 fix="width">
                        </li>
                        <li>
                            <img path="/personal/2023/invisible-feast/main-course.png"
                                 fix="width">
                        </li>
                        <li>
                            <img path="/personal/2023/invisible-feast/salad.png"
                                 fix="width">
                        </li>
                        <li>
                            <img path="/personal/2023/invisible-feast/staple-food.png"
                                 fix="width">
                        </li>
                    </ul>
                    <div class="overlay"></div>
                </div>
                <div class="highlight" style="margin-left: auto; padding: 0.75rem 0 0.75rem;">SLIDE →</div>
                <img path="/personal/2023/invisible-feast/3-desert.png" fix="width">
            </div>
        </div>
    </div>
</div>
<?php include 'components/footer.php' ?>
</body>
</html>