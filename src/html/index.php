<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO</title>
    <meta name=description content="Olivia Zuo's design portfolio.">

    <link rel="icon" type="image/x-icon"
          href="https://image-resizer.simonpforster.com/oliviazuo-portfolio/elements/element-pink.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/modal.css">
    <link rel="stylesheet" href="./resources/styles/section.css">
    <link rel="stylesheet" href="./resources/styles/page/index.css">
    <link rel="stylesheet" href="./resources/styles/gallery-slider.css">
    <link rel="stylesheet" href="./resources/styles/grids-min.css">
    <link rel="stylesheet" href="./resources/styles/custom-grids-min.css">

    <script src="./resources/js/image.js" type="module"></script>
    <script src="./resources/js/solid-gallery.js" type="module"></script>
    <?php require "../components/gallery.php"; ?>
</head>
<body>
<?php include "../components/modal.php"; ?>
<div id="screen">
    <?php include "../components/header.php"; ?>
    <div class="highlight"
         style="text-wrap: nowrap; position: absolute; bottom: 0; right: 0; padding: inherit; display: flex; flex-direction: column; width: min-content;">
        <img path="/elements/element-pink.png" fix="width">
        <a href="#offscreen" style="width: fit-content;" id="archive-arrow">ARCHIVE ↓</a>
    </div>
</div>
<div id="offscreen">
    <div class="column-container">
        <div class="pure-g">
            <!-- Column 1/6 -->
            <div class="normal-1-6">
                <!-- Personal: Spectral Archive -->
                <figure>
                    <?php gallery("spectral-archive", [
                        "/personal/2023/spectral-archive/day-3-1.jpg" =>
                            "width",
                        "/personal/2023/spectral-archive/day-3-2.jpg" =>
                            "width",
                        "/personal/2023/spectral-archive/day-3-3.jpg" =>
                            "width",
                        "/personal/2023/spectral-archive/day-6-1.jpg" =>
                            "width",
                        "/personal/2023/spectral-archive/day-6-2.jpg" =>
                            "width",
                        "/personal/2023/spectral-archive/day-6-3.jpg" =>
                            "width",
                    ]); ?>
                    <img path="/personal/2023/spectral-archive/archive.jpg"
                         fix="width">
                    <figcaption>Spectral Archive</figcaption>
                </figure>
                <!-- Commercial: Nike Big Bang Network -->
                <figure>
                    <img path="/commercial/nike/background-1.jpg"
                         fix="width">
                    <img path="/commercial/nike/background-2.jpg"
                         fix="width">
                    <img path="/commercial/nike/background-3.jpg"
                         fix="width">
                    <figcaption>Nike Big Bang Network</figcaption>
                </figure>
                <!-- Commercial: NYU Shanghai Opening Fall 2022 -->
                <figure>
                    <img path="/commercial/nyu-shanghai/opening-fall-2022/cover.jpg"
                         fix="width">
                    <figcaption>NYU SH Opening Fall 2022</figcaption>
                </figure>
                <!-- Commercial: NYU SH 10th Anniversary -->
                <figure>
                    <img path="/commercial/nyu-shanghai/10th-anniversary/cover.png"
                         fix="width">
                    <figcaption>NYU SH 10th Anniversary</figcaption>
                </figure>
            </div>
            <!-- Column 2/6 -->
            <div class="normal-1-6">
                <!-- Personal: The Visitor -->
                <figure>
                    <img path="/personal/2022/the-visitor/picture-booklet-1.jpg"
                         fix="width">
                    <?php gallery("the-visitor", [
                        "/personal/2022/the-visitor/drawing-board-2-2.jpg" =>
                            "width",
                        "/personal/2022/the-visitor/drawing-board-3.jpg" =>
                            "width",
                        "/personal/2022/the-visitor/drawing-board-4.jpg" =>
                            "width",
                        "/personal/2022/the-visitor/drawing-board-5.jpg" =>
                            "width",
                        "/personal/2022/the-visitor/drawing-board-6.jpg" =>
                            "width",
                        "/personal/2022/the-visitor/drawing-board-7.jpg" =>
                            "width",
                    ]); ?>
                    <img path="/personal/2022/the-visitor/picture-booklet-2.jpg"
                         fix="width">
                    <figcaption>The Visitor</figcaption>
                </figure>
                <!-- Personal: Utopia -->
                <figure>
                    <?php gallery("utopia", [
                        "/personal/2020/utopia/artboard-1-copy-2.jpg" =>
                            "width",
                        "/personal/2020/utopia/artboard-1-copy-3.jpg" =>
                            "width",
                        "/personal/2020/utopia/artboard-1-copy-4.jpg" =>
                            "width",
                    ]); ?>
                    <img path="/personal/2020/utopia/artboard-2.jpg"
                         fix="width">
                    <figcaption>Utopia</figcaption>
                </figure>
            </div>
            <!-- Column 3/6 -->
            <div class="normal-1-6">
                <!-- Personal: Invisible Feast-->
                <figure>
                    <img path="/personal/2023/invisible-feast/3-desert.png"
                         fix="width">
                    <img
                            path="/personal/2023/invisible-feast/collection-web.png"
                            fix="width">
                    <figcaption>Invisible Feast</figcaption>
                </figure>
                <!-- Commercial: Peet's Coffee Pure Blend-->
                <figure>
                    <img
                            path="/commercial/peets-coffee/pure-blend/PET-packaging-picture.jpg"
                            fix="width">
                    <figcaption>Peet's Coffee Pure Blend</figcaption>
                </figure>
                <!-- Commercial: Peet's Coffee x ARC'TERYX-->
                <figure>
                    <img
                            path="/commercial/peets-coffee/peets-coffee-x-arcteryx/3-cans.jpg"
                            fix="width">
                    <figcaption>Peet's Coffee x ARC'TERYX</figcaption>
                </figure>
                <!-- Commercial: New Balance SCF -->
                <figure>
                    <?php gallery(
                        "new-balance",
                        [
                            "/commercial/new-balance/picture-shoe.jpg" =>
                                "width",
                            "/commercial/new-balance/picture-stand-stickers.jpg" =>
                                "width",
                            "/commercial/new-balance/picture-garnish-station.jpg" =>
                                "width",
                        ],
                        false
                    ); ?>
                    <img path="/commercial/new-balance/picture-shoot.jpg"
                         fix="width">
                    <figcaption>New Balance SCF</figcaption>
                </figure>
            </div>
            <!-- Column 4/6 -->
            <div class="normal-1-6">
                <!-- Personal: Gutter and Soul -->
                <figure>
                    <img
                            path="/personal/2022/gutter-and-soul/phase-1-make-a-wish.jpg"
                            fix="width">
                    <img
                            path="/personal/2022/gutter-and-soul/phase-2-cemeteryland.jpg"
                            fix="width">
                    <img
                            path="/personal/2022/gutter-and-soul/phase-3-the-dive.jpg"
                            fix="width">
                    <img
                            path="/personal/2022/gutter-and-soul/phase-4-wishful-thinking.jpg"
                            fix="width">
                    <img
                            path="/personal/2022/gutter-and-soul/phase-5-dream-comes-true.jpg"
                            fix="width">
                    <figcaption>Gutter and Soul</figcaption>
                </figure>
                <!-- Commercial: OMO Floor Cleaner Machine Formula -->
                <figure>
                    <img
                            path="/commercial/omo/packaging-white-bg.jpg"
                            fix="width">
                    <figcaption>OMO Floor Cleaner Machine Formula</figcaption>
                </figure>
            </div>
            <!-- Column 5/6 -->
            <div class="normal-1-6">
                <!-- Personal: Dialogue -->
                <figure>
                    <?php gallery("dialogue", [
                        "/personal/2022/dialogue/poster-1-cyan.png" => "width",
                        "/personal/2022/dialogue/poster-2-black.png" => "width",
                        "/personal/2022/dialogue/poster-3-red.png" => "width",
                        "/personal/2022/dialogue/poster-4-pink.png" => "width",
                    ]); ?>
                    <img path="/personal/2022/dialogue/picture.jpeg"
                         fix="width">
                    <figcaption>Dialogue</figcaption>
                </figure>
                <!-- Personal: Obloom -->
                <figure>
                    <?php gallery("obloom", [
                        "/personal/2021/obloom/interface-1.jpg" => "width",
                        "/personal/2021/obloom/interface-2.jpg" => "width",
                        "/personal/2021/obloom/interface-3.jpg" => "width",
                        "/personal/2021/obloom/interface-4.jpg" => "width",
                    ]); ?>
                    <img path="/personal/2021/obloom/compact-disc.jpg"
                         fix="width">
                    <img path="/personal/2021/obloom/floppy-disc.jpg"
                         fix="width">
                    <img path="/personal/2021/obloom/cassette-tape.jpg"
                         fix="width">
                    <figcaption>Obloom</figcaption>
                </figure>
                <!-- Commercial: Budweiser Annual Creative-X Awards Ceremony -->
                <figure>
                    <?php gallery("bacac", [
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
                        "/commercial/budweiser/annual-creative-x-awards/4-creative-partner.jpg" =>
                            "width",
                        "/commercial/budweiser/annual-creative-x-awards/4-draftline-of-the-year.jpg" =>
                            "width",
                        "/commercial/budweiser/annual-creative-x-awards/4-grand-prix.jpg" =>
                            "width",
                    ]); ?>
                    <img
                            path="/commercial/budweiser/annual-creative-x-awards/picture.jpg"
                            fix="width">
                    <figcaption>Budweiser Annual Creative-X Awards Ceremony</figcaption>
                </figure>
            </div>
            <!-- Column 6/6 -->
            <div class="normal-1-6">
                <!-- Personal: Another Romance -->
                <figure>
                    <img path="/personal/2021/another-romance/marble-screen.jpg"
                         fix="width">
                    <img path="/personal/2021/another-romance/installation-picture.jpg"
                         fix="width">
                    <figcaption>Another Romance</figcaption>
                </figure>
                <!-- Commercial: Budweiser Unmet Gala -->
                <figure>
                    <img path="/commercial/budweiser/unmet-gala/invitation.jpg" fix="width">
                    <figcaption>Budweiser Unmet Gala</figcaption>
                </figure>
                <!-- Commercial: Budweiser Zoom Background -->
                <figure>
                    <img
                            path="/commercial/budweiser/unmet-gala/zoom-bg-kitchen.png"
                            fix="width">
                    <img
                            path="/commercial/budweiser/unmet-gala/zoom-bg-bedroom.png"
                            fix="width">
                    <img
                            path="/commercial/budweiser/unmet-gala/zoom-bg-living-room.png"
                            fix="width">
                    <img
                            path="/commercial/budweiser/unmet-gala/zoom-bg-balcony.png"
                            fix="width">
                    <figcaption>Budweiser Zoom Background</figcaption>
                </figure>
            </div>
        </div>
    </div>
</div>
<?php include "../components/footer.php"; ?>
</body>
</html>
