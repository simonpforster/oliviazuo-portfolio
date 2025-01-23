<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO</title>
    <meta name=description content="Olivia Zuo's design portfolio.">

    <link rel="icon" type="image/x-icon"
          href="https://image-resizer.simonpforster.com/oliviazuo-portfolio/elements/element-pink.png?width=480">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/modal.css">
    <link rel="stylesheet" href="./resources/styles/section.css">
    <link rel="stylesheet" href="./resources/styles/page/index.css">
    <link rel="stylesheet" href="./resources/styles/gallery-slider.css">
    <link rel="stylesheet" href="./resources/styles/grids.css">

    <?php
    require_once __DIR__ . "/../components/config.php";
    jsConfig();
    ?>
    <script src="./resources/js/image.js" type="module"></script>
    <?php require_once __DIR__ . "/../components/image.php"; ?>
    <?php
    require_once __DIR__ . "/../components/gallery.php";
    galleryScript();
    ?>
</head>
<body>
<?php include "../components/modal.php"; ?>
<div id="screen">
    <?php include "../components/header.php"; ?>
    <div class="highlight"
         style="text-wrap: nowrap; position: absolute; bottom: 0; right: 0; padding: inherit; display: flex; flex-direction: column; width: min-content;">
        <a href="#offscreen" style="width: fit-content;" id="archive-arrow"><?php echo image("/elements/element-pink.png"); ?>ARCHIVE ↓</a>
    </div>
</div>
<div id="offscreen">
    <div class="column-container">
        <div class="pure-g">
            <!-- Column 1/6 -->
            <div class="normal-1-6">
                <!-- Personal: Spectral Archive -->
                <figure>
                    <?php echo gallery("spectral-archive", [
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
                    <?php echo image(
                        "/personal/2023/spectral-archive/archive.jpg"
                    ); ?>
                    <figcaption>Spectral Archive</figcaption>
                </figure>
                <!-- Commercial: Nike Big Bang Network -->
                <figure>
                    <?php
                    echo image("/commercial/nike/background-1.jpg");
                    echo image("/commercial/nike/background-2.jpg");
                    echo image("/commercial/nike/background-3.jpg");
                    ?>
                    <figcaption>Nike Big Bang Network</figcaption>
                </figure>
                <!-- Commercial: NYU Shanghai Opening Fall 2022 -->
                <figure>
                    <?php echo image(
                        "/commercial/nyu-shanghai/opening-fall-2022/cover.jpg"
                    ); ?>
                    <figcaption>NYU SH Opening Fall 2022</figcaption>
                </figure>
                <!-- Commercial: NYU SH 10th Anniversary -->
                <figure>
                    <?php echo image(
                        "/commercial/nyu-shanghai/10th-anniversary/cover.png"
                    ); ?>
                    <figcaption>NYU SH 10th Anniversary</figcaption>
                </figure>
            </div>
            <!-- Column 2/6 -->
            <div class="normal-1-6">
                <!-- Personal: The Visitor -->
                <figure>
                    <?php echo image(
                        "/personal/2022/the-visitor/picture-booklet-1.jpg"
                    ); ?>
                    <?php echo gallery("the-visitor", [
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
                    <?php echo image(
                        "/personal/2022/the-visitor/picture-booklet-2.jpg"
                    ); ?>
                    <figcaption>The Visitor</figcaption>
                </figure>
                <!-- Personal: Utopia -->
                <figure>
                    <?php echo gallery("utopia", [
                        "/personal/2020/utopia/artboard-1-copy-2.jpg" =>
                            "width",
                        "/personal/2020/utopia/artboard-1-copy-3.jpg" =>
                            "width",
                        "/personal/2020/utopia/artboard-1-copy-4.jpg" =>
                            "width",
                    ]); ?>
                    <?php echo image("/personal/2020/utopia/artboard-2.jpg"); ?>
                    <figcaption>Utopia</figcaption>
                </figure>
            </div>
            <!-- Column 3/6 -->
            <div class="normal-1-6">
                <!-- Personal: Invisible Feast-->
                <figure>
                    <?php
                    echo image("/personal/2023/invisible-feast/3-desert.png");
                    echo image(
                        "/personal/2023/invisible-feast/collection-web.png"
                    );
                    ?>
                    <figcaption>Invisible Feast</figcaption>
                </figure>
                <!-- Commercial: Peet's Coffee Pure Blend-->
                <figure>
                    <?php echo image(
                        "/commercial/peets-coffee/pure-blend/PET-packaging-picture.jpg"
                    ); ?>
                    <figcaption>Peet's Coffee Pure Blend</figcaption>
                </figure>
                <!-- Commercial: Peet's Coffee x ARC'TERYX-->
                <figure>
                    <?php echo image(
                        "/commercial/peets-coffee/peets-coffee-x-arcteryx/3-cans.jpg"
                    ); ?>
                    <figcaption>Peet's Coffee x ARC'TERYX</figcaption>
                </figure>
                <!-- Commercial: New Balance SCF -->
                <figure>
                    <?php
                    gallery(
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
                    );
                    echo image("/commercial/new-balance/picture-shoot.jpg");
                    ?>
                    <figcaption>New Balance SCF</figcaption>
                </figure>
            </div>
            <!-- Column 4/6 -->
            <div class="normal-1-6">
                <!-- Personal: Gutter and Soul -->
                <figure>
                    <?php
                    echo image(
                        "/personal/2022/gutter-and-soul/phase-1-make-a-wish.jpg"
                    );
                    echo image(
                        "/personal/2022/gutter-and-soul/phase-2-cemeteryland.jpg"
                    );
                    echo image(
                        "/personal/2022/gutter-and-soul/phase-3-the-dive.jpg"
                    );
                    echo image(
                        "/personal/2022/gutter-and-soul/phase-4-wishful-thinking.jpg"
                    );
                    echo image(
                        "/personal/2022/gutter-and-soul/phase-5-dream-comes-true.jpg"
                    );
                    ?>
                    <figcaption>Gutter and Soul</figcaption>
                </figure>
                <!-- Commercial: OMO Floor Cleaner Machine Formula -->
                <figure>
                    <?php echo image(
                        "/commercial/omo/packaging-white-bg.jpg"
                    ); ?>
                    <figcaption>OMO Floor Cleaner Machine Formula</figcaption>
                </figure>
            </div>
            <!-- Column 5/6 -->
            <div class="normal-1-6">
                <!-- Personal: Dialogue -->
                <figure>
                    <?php echo gallery("dialogue", [
                        "/personal/2022/dialogue/poster-1-cyan.png" => "width",
                        "/personal/2022/dialogue/poster-2-black.png" => "width",
                        "/personal/2022/dialogue/poster-3-red.png" => "width",
                        "/personal/2022/dialogue/poster-4-pink.png" => "width",
                    ]); ?>
                    <?php echo image("/personal/2022/dialogue/picture.jpeg"); ?>
                    <figcaption>Dialogue</figcaption>
                </figure>
                <!-- Personal: Obloom -->
                <figure>
                    <?php
                    echo gallery("obloom", [
                        "/personal/2021/obloom/interface-1.jpg" => "width",
                        "/personal/2021/obloom/interface-2.jpg" => "width",
                        "/personal/2021/obloom/interface-3.jpg" => "width",
                        "/personal/2021/obloom/interface-4.jpg" => "width",
                    ]);
                    echo image("/personal/2021/obloom/compact-disc.jpg");
                    echo image("/personal/2021/obloom/floppy-disc.jpg");
                    echo image("/personal/2021/obloom/cassette-tape.jpg");
                    ?>
                    <figcaption>Obloom</figcaption>
                </figure>
                <!-- Commercial: Budweiser Annual Creative-X Awards Ceremony -->
                <figure>
                    <?php
                    echo gallery("bacac", [
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
                    ]);
                    echo image(
                        "/commercial/budweiser/annual-creative-x-awards/picture.jpg"
                    );
                    ?>
                    <figcaption>Budweiser Annual Creative-X Awards Ceremony</figcaption>
                </figure>
            </div>
            <!-- Column 6/6 -->
            <div class="normal-1-6">
                <!-- Personal: Another Romance -->
                <figure>
                    <?php
                    echo image(
                        "/personal/2021/another-romance/marble-screen.jpg"
                    );
                    echo image(
                        "/personal/2021/another-romance/installation-picture.jpg"
                    );
                    ?>
                    <figcaption>Another Romance</figcaption>
                </figure>
                <!-- Commercial: Budweiser Unmet Gala -->
                <figure>
                    <?php echo image(
                        "/commercial/budweiser/unmet-gala/invitation.jpg"
                    ); ?>
                    <figcaption>Budweiser Unmet Gala</figcaption>
                </figure>
                <!-- Commercial: Budweiser Zoom Background -->
                <figure>
                    <?php
                    echo image(
                        "/commercial/budweiser/unmet-gala/zoom-bg-kitchen.png"
                    );
                    echo image(
                        "/commercial/budweiser/unmet-gala/zoom-bg-bedroom.png"
                    );
                    echo image(
                        "/commercial/budweiser/unmet-gala/zoom-bg-living-room.png"
                    );
                    echo image(
                        "/commercial/budweiser/unmet-gala/zoom-bg-balcony.png"
                    );
                    ?>
                    <figcaption>Budweiser Zoom Background</figcaption>
                </figure>
            </div>
        </div>
        <div style="height: 8rem;"></div>
    </div>
</div>
<?php include "../components/footer.php"; ?>
</body>
</html>
