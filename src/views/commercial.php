<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO - COMMERCIAL</title>
    <meta name=description content="Olivia Zuo's portfolio of commercial projects.">

    <link rel="icon" type="image/x-icon"
          href="https://image-resizer.simonpforster.com/oliviazuo-portfolio/elements/element-blue.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/modal.css">
    <link rel="stylesheet" href="./resources/styles/section.css">
    <link rel="stylesheet" href="./resources/styles/page/commercial.css">
    <link rel="stylesheet" href="./resources/styles/grids.css">
    <link rel="stylesheet" href="./resources/styles/mobile-gallery-slider.css">

    <?php require_once "../components/config.php"; jsConfig(); ?>
    <script src="./resources/js/image.js" type="module"></script>
    <?php require_once (__DIR__ . "/../components/image.php"); ?>
    <?php require_once (__DIR__ . "/../components/gallery.php"); galleryScript(); ?>
</head>
<body>
<?php include "../components/modal.php"; ?>
<div id="screen">
    <?php include "../components/header.php"; ?>
</div>
<div id="offscreen">
    <div class="column-container">
        <div class="section" id="nike-big-bang">
            <div class="desktop-20 empty"></div>
            <div class="desktop-1-2 text">
                <?php echo gallery("nike-big-bang-gallery", [
                    "/commercial/nike/background-2.jpg" => "width",
                    "/commercial/nike/background-1.jpg" => "width",
                    "/commercial/nike/background-3.jpg" => "width",
                ]); ?>
                <div class="text">
                    <div class="highlight">NIKE</div>
                    <div>
                        The Big Bang Network, 2022
                    </div>
                </div>
            </div>
            <div class="desktop-30">
                <img path="/commercial/nike/icon-1.png"
                     fix="width">
                <img path="/commercial/nike/icon-3.png"
                     fix="width">
                <img path="/commercial/nike/icon-2.png"
                     fix="width">
            </div>
        </div>

        <div class="section" id="new-balance">
            <div class="desktop-30 empty"></div>
            <div class="desktop-10 mobile-slider-x" id="new-balance-illustrations">
                <ul>
                    <li>
                        <img path="/commercial/new-balance/illustration-monitor.png"
                             fix="width">
                    </li>
                    <li>
                        <img path="/commercial/new-balance/illustration-megaphone.png"
                             fix="width">
                    </li>
                    <li>
                        <img path="/commercial/new-balance/illustration-clapperboard.png"
                             fix="width">
                    </li>
                    <li>
                        <img path="/commercial/new-balance/illustration-laptop.png"
                             fix="width">
                    </li>
                    <li>
                        <img path="/commercial/new-balance/illustration-lightbulb.png"
                             fix="width">
                    </li>
                </ul>
                <div class="mobile-overlay-x"></div>
            </div>
            <div class="desktop-60 text">
                <?php gallery(
                    "gallery-new-balance",
                    [
                        "/commercial/new-balance/picture-shoot.jpg" => "width",
                        "/commercial/new-balance/picture-box-stickers.jpg" =>
                            "width",
                        "/commercial/new-balance/picture-shoe.jpg" => "width",
                    ],
                    false,
                    true
                ); ?>
                <div class="text">
                    <div class="highlight">
                        NEW BALANCE
                    </div>
                    <div>
                        Shanghai Content Factory, 2023
                    </div>
                </div>
            </div>
        </div>

        <div class="section" id="budweiser-creative-x">
            <div class="desktop-1-2 text">
                <div class="text">
                    <div class="highlight">BUDWEISER</div>
                    <div>
                        Annual Creative-X Awards Ceremoy, 2021
                    </div>
                </div>
            </div>
            <div class="desktop-25">
                <?php echo gallery("budweiser-creative-x-gallery", [
                    "/commercial/budweiser/annual-creative-x-awards/1-creative-brand-strategy.jpg" =>
                        "width",
                    "/commercial/budweiser/annual-creative-x-awards/1-scale-and-adapt.jpg" =>
                        "width",
                    "/commercial/budweiser/annual-creative-x-awards/2-creative-execution.jpg" =>
                        "width",
                    "/commercial/budweiser/annual-creative-x-awards/2-entertainment.jpg" =>
                        "width",
                    "/commercial/budweiser/annual-creative-x-awards/3-better-world.jpg" =>
                        "width",
                    "/commercial/budweiser/annual-creative-x-awards/3-smart-drinking.jpg" =>
                        "width",
                    "/commercial/budweiser/annual-creative-x-awards/4-draftline-of-the-year.jpg" =>
                        "width",
                    "/commercial/budweiser/annual-creative-x-awards/4-grand-prix.jpg" =>
                        "width",
                ]); ?>
            </div>
            <div class="desktop-25 empty"></div>
        </div>

        <div class="section" id="budweiser-unmet-gala">
            <div class="desktop-15 empty"></div>
            <div class="desktop-35 text">
                <?php echo gallery("budweiser-creative-unmet-gala", [
                    "/commercial/budweiser/unmet-gala/zoom-bg-balcony.png" =>
                        "width",
                    "/commercial/budweiser/unmet-gala/zoom-bg-kitchen.png" =>
                        "width",
                ]); ?>
                <div class="text">
                    <div class="highlight">BUDWEISER</div>
                    <div>
                        Unmet Gala, 2022
                    </div>
                </div>
            </div>
            <div class="desktop-1-2">
                <img path="/commercial/budweiser/unmet-gala/zoom-bg-bedroom.png"
                     fix="width">
            </div>
        </div>

        <div class="section" id="nyu-shanghai-opening-fall">
            <div class="desktop-40">
                <img path="/commercial/nyu-shanghai/opening-fall-2022/cover.jpg"
                     fix="width">
            </div>
            <div class="desktop-1-2 text">
                <?php echo gallery("nyu-shanghai-opening-fall-gallery", [
                    "/commercial/nyu-shanghai/opening-fall-2022/pages-18-19.png" =>
                        "width",
                    "/commercial/nyu-shanghai/opening-fall-2022/pages-spread-21.png" =>
                        "width",
                ]); ?>
                <div class="text">
                    <div class="highlight">NYU SHANGHAI</div>
                    <div>
                        Opening Fall, 2022
                    </div>
                </div>
            </div>
            <div class="desktop-10 empty"></div>
        </div>

        <div class="section" id="nyu-shanghai-10th-anniversary">
            <div class="desktop-25 text">
                <img path="/commercial/nyu-shanghai/10th-anniversary/cover.png"
                     fix="width">
                <div class="text">
                    <div class="highlight">NYU SHANGHAI</div>
                    <div>
                        10th Anniversary Special Edition, 2022
                    </div>
                </div>
            </div>
            <div class="desktop-55 ">
                <?php echo gallery("nyu-shanghai-10th-anniversary-gallery", [
                    "/commercial/nyu-shanghai/10th-anniversary/development-spread.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/development-pages.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/research-spread.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/research-pages.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/education-spread.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/education-pages.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/exchange-spread.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/exchange-pages.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/prospects-spread.png" =>
                        "width",
                    "/commercial/nyu-shanghai/10th-anniversary/prospects-pages.png" =>
                        "width",
                ]); ?>
            </div>
            <div class="desktop-20 empty"></div>
        </div>

        <div class="section" id="omo">
            <div class="desktop-40 text">
                <img path="/commercial/omo/packaging-grey-bg.jpg"
                     fix="width">
                <div class="text">
                    <div class="highlight">OMO</div>
                    <div>
                        Floor Cleaner Machine Formula
                    </div>
                </div>
            </div>
            <div class="desktop-30 ">
                <img path="/commercial/omo/ad.jpg"
                     fix="width">
            </div>
            <div class="desktop-30 empty"></div>
        </div>

        <div class="section" id="peets-coffee-pure-blend">
            <div class="desktop-40 empty"></div>
            <div class="desktop-35 text">
                <img path="/commercial/peets-coffee/pure-blend/PET-packaging-picture.jpg"
                     fix="width">
                <div class="text">
                    <div class="highlight">Peet's Coffee</div>
                    <div>
                        Pure Blend, 2022
                    </div>
                </div>
            </div>
            <div class="desktop-25">
                <img path="/commercial/peets-coffee/pure-blend/PET-packaging-schematic-2.png"
                     fix="width" style="padding-bottom:1.5rem;">
                <img path="/commercial/peets-coffee/pure-blend/PET-packaging-schematic-1.png"
                     fix="width" style="width:80%;">
            </div>
        </div>

        <div class="section" id="peets-coffee-arcteryx">
            <div class="desktop-35 text">
                <img path="/commercial/peets-coffee/peets-coffee-x-arcteryx/3-cans.jpg"
                     fix="width">
                <div class="text">
                    <div class="highlight">PEET’S COFFEE x ARC’TERYX</div>
                    <div>
                        Pop-up, 2023
                    </div>
                </div>
            </div>
            <div class="desktop-25">
                <?php echo gallery("peets-coffee-arcteryx-gallery", [
                    "/commercial/peets-coffee/peets-coffee-x-arcteryx/1-cans.jpg" =>
                        "width",
                    "/commercial/peets-coffee/peets-coffee-x-arcteryx/2-cans.jpg" =>
                        "width",
                ]); ?>
            </div>
            <div class="desktop-40 empty"></div>
        </div>
    </div>
    <?php include "../components/footer.php"; ?>
</body>
</html>
