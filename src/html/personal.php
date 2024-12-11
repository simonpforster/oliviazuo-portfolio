<!doctype html>
<html lang="en">
<head>
    <title>OLIVIA ZUO - PERSONAL</title>
    <meta name=description content="Olivia Zuo's portfolio of personal projects.">

    <link rel="icon" type="image/x-icon"
          href="https://image-resizer.simonpforster.com/oliviazuo-portfolio/elements/element-cyan.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <link rel="stylesheet" href="./resources/styles/base-min.css">
    <link rel="stylesheet" href="./resources/styles/modal.css">
    <link rel="stylesheet" href="./resources/styles/section.css">
    <link rel="stylesheet" href="./resources/styles/page/personal.css">
    <link rel="stylesheet" href="./resources/styles/grids-min.css">
    <link rel="stylesheet" href="./resources/styles/custom-grids-min.css">
    <link rel="stylesheet" href="./resources/styles/gallery-slider.css">

    <?php require "../components/config.php"; ?>
    <script src="./resources/js/image.js" type="module"></script>
    <script src="./resources/js/solid-gallery.js" type="module"></script>
    <?php require "../components/gallery.php"; ?>
    <script src="https://player.vimeo.com/api/player.js" type="module"></script>
</head>
<body>
<?php include "../components/modal.php"; ?>
<div id="screen">
    <?php include "../components/header.php"; ?>
</div>
<div id="offscreen">
    <div class="column-container">
        <div class="section" id="rerendered-memory">
            <div class="desktop-25">
                <img path="/personal/2024/rerendered-memory/combine-scan.jpg" fix="width">
                <div class="spacing" style="height: 1.5rem;"></div>
                <img path="/personal/2024/rerendered-memory/poster-picture-printer.jpg" fix="width">
            </div>
            <div class="desktop-1-2 text">
                <img path="/personal/2024/rerendered-memory/poster-scan.jpg" fix="width">
                <div class="text">
                    <div class="highlight">RERENDERED MEMORY, 2024</div>
                    <div>
                        Today, digital technologies are considered as a means of stepping backward - whether physically
                        reconstructing obsolete hardware or digitally regurgitating public information films, a
                        fascination with capturing media of today in a net of the past is becoming more prevalent. The
                        attraction to old technologies and the resurrection of faux-vintage aesthetics through new
                        mediums, often referred to as "tech-nostalgia".
                    </div>
                    <div>
                        By investigating the iterative process of digital images in screen devices, my aim is to explore
                        the transition from "technologies of memory" to "memory of technologies" within the context of
                        the reminiscence of past media technologies in contemporary memory practices. And these
                        manifestations of tech-nostalgia reflect a new kind of memory practice which is not driven by
                        nostalgia in the classical sense as a longing for the past but rather mediates between the past
                        and the present, the analogue and the digital the archival and the performative.
                    </div>
                </div>
            </div>
            <div class="desktop-25 empty"></div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="spectral-archive">
            <div class="desktop-15 empty"></div>
            <div class="desktop-35">
                <?php gallery("spectral-archive-gallery", [
                    "/personal/2023/spectral-archive/day-3-1.jpg" => "width",
                    "/personal/2023/spectral-archive/day-3-2.jpg" => "width",
                    "/personal/2023/spectral-archive/day-3-3.jpg" => "width",
                    "/personal/2023/spectral-archive/day-6-1.jpg" => "width",
                    "/personal/2023/spectral-archive/day-6-2.jpg" => "width",
                    "/personal/2023/spectral-archive/day-6-3.jpg" => "width",
                ]); ?>
            </div>
            <div class="desktop-1-2 text">
                <img path="/personal/2023/spectral-archive/archive.jpg" fix="width"
                     style="aspect-ratio: 1.15; object-fit: cover;">
                <div class="text">
                    <div class="highlight">SPECTRAL ARCHIVE, 2023</div>
                    <div>
                        is about the process of memory reconstruction by bridging the gap between my digital and
                        physical recollections.
                    </div>
                    <div>
                        it draws upon knowledge from memory-based records-keeping, aiming to interrogate the
                        significance of archival documentation in the act of “recalling.”
                    </div>
                </div>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="invisible-feast">
            <div class="normal-1-2 text">
                <?php gallery("invisible-feast-gallery", [
                    "/personal/2023/invisible-feast/web-index.png" => "width",
                    "/personal/2023/invisible-feast/web-projects.png" =>
                        "width",
                    "/personal/2023/invisible-feast/web-journal.png" => "width",
                    "/personal/2023/invisible-feast/web-recipes-1.png" =>
                        "width",
                    "/personal/2023/invisible-feast/web-recipes-2.png" =>
                        "width",
                    "/personal/2023/invisible-feast/web-about.png" => "width",
                ]); ?>
                <div class="text">
                    <div class="highlight">INVISIBLE FEAST, 2023</div>
                    <div>
                        discusses the diversity and possibilities of future dietary structures in the current
                        context of the food crisis.
                    </div>
                    <div>
                        by simulating a future in which extinct animals and sustainable protein sources are used as
                        ingredients, efforts towards a “future-proof” diet are re-examined from an ironic
                        perspective.
                    </div>
                </div>
            </div>
            <div class="normal-1-2">
                <div class="slider">
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
                    <div class="overlay-x"></div>
                </div>
                <div class="highlight" style="margin-left: auto; horiz-align: right;">SLIDE →</div>
                <img path="/personal/2023/invisible-feast/3-desert.png" fix="width">
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="the-visitor">
            <div class="desktop-30">
                <?php gallery("the-visitor-gallery-1", [
                    "/personal/2022/the-visitor/drawing-board-7.jpg" => "width",
                    "/personal/2022/the-visitor/drawing-board-6.jpg" => "width",
                    "/personal/2022/the-visitor/drawing-board-5.jpg" => "width",
                    "/personal/2022/the-visitor/drawing-board-4.jpg" => "width",
                    "/personal/2022/the-visitor/drawing-board-3.jpg" => "width",
                    "/personal/2022/the-visitor/drawing-board-2-2.jpg" =>
                        "width",
                ]); ?>
            </div>
            <div class="desktop-1-2 text">
                <?php gallery("the-visitor-gallery-2", [
                    "/personal/2022/the-visitor/picture-booklet-1.jpg" =>
                        "width",
                    "/personal/2022/the-visitor/picture-booklet-2.jpg" =>
                        "width",
                    "/personal/2022/the-visitor/picture-booklet-3.jpg" =>
                        "width",
                ]); ?>
                <div class="text">
                    <div class="highlight">THE VISITOR, 2022</div>
                    <div>
                        explores the hypothesis of a future where humans are able to travel back in time to change their
                        regretful decisions as "visitors".
                    </div>
                    <div>
                        five refractive mediums are used as carriers of transportation through the past and future to
                        express my concerns about human’s self-destructive tendencies with metaphors: any attempt to
                        change
                        the past for self-protection will only lead to a more collapsed future.
                    </div>
                </div>
            </div>
            <div class="desktop-20 empty"></div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="gutter-and-soul">
            <div class="desktop-15 empty"></div>
            <div class="desktop-35">
                <?php gallery("gutter-and-soul-gallery", [
                    "/personal/2022/gutter-and-soul/phase-2-cemeteryland.jpg" =>
                        "width",
                    "/personal/2022/gutter-and-soul/phase-1-make-a-wish.jpg" =>
                        "width",
                ]); ?>
            </div>
            <div class="desktop-1-2 text">
                <img path="/personal/2022/gutter-and-soul/phase-3-the-dive.jpg"
                     fix="width">
                <div class="text">
                    <div class="highlight">GUTTER AND SOUL, 2022</div>
                    <div>
                        explores the conception of “otherness”: what kind of life is accepted by the majority as
                        satisfactory, and guaranteed to be free from defects and judgement.
                    </div>
                    <div>
                        a series of surreal scenes and items are used to show the subtle poisoning and emasculation of
                        the “minorities."
                    </div>
                </div>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="dialogue">
            <div class="desktop-1-2 text">
                <?php gallery("dialogue-gallery-1", [
                    "/personal/2022/dialogue/alphabet.jpg" => "width",
                    "/personal/2022/dialogue/poster-mockups.jpg" => "width",
                ]); ?>
                <div class="text">
                    <div class="highlight">DIALOGUE, 2022</div>
                    <div>
                        discusses the association between attachment orientations and relationship dynamics in partners.
                    </div>
                    <div>
                        with pursuit and distancing as the main theme, voices of couples with different attachment types
                        in various scenarios are visualised as a typeface to highlight the relational basis of intimate
                        violence.
                    </div>
                </div>
            </div>
            <div class="desktop-35">
                <?php gallery("dialogue-gallery-2", [
                    "/personal/2022/dialogue/installation-1.jpg" => "width",
                    "/personal/2022/dialogue/installation-2.jpg" => "width",
                ]); ?>
            </div>
            <div class="desktop-15 empty"></div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="another-romance">
            <div class="desktop-15 empty"></div>
            <div class="desktop-35 text">
                <?php gallery("another-romance-gallery", [
                    "/personal/2021/another-romance/installation-render-1.jpg" =>
                        "width",
                    "/personal/2021/another-romance/installation-render-3.jpg" =>
                        "width",
                ]); ?>
                <div class="spacing" style="height: 1.5rem;"></div>
                <img path="/personal/2021/another-romance/installation-picture.jpg"
                     fix="width">
                <div class="text">
                    <div class="highlight">ANOTHER ROMANCE, 2022</div>
                    <div>
                        explores the essence of intimate relationships and the invisible and explicit links (emotions
                        and space etc.) among them: a 'cocoon' woven and constructed from secrets of just between
                        couples.
                    </div>
                    <div>
                        gestures, emotions and unspoken messages gradually become the mainstay of their communication
                        within it, to the point of creating a “language system” that is incomprehensible to others.
                    </div>
                </div>
            </div>
            <div class="desktop-1-2">
                <div style="padding:56.25% 0 0 0;position:relative;">
                    <iframe src="https://player.vimeo.com/video/664246920?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                            style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;"
                            title="Another Romance"></iframe>
                </div>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="obloom">
            <div class="desktop-1-2">
                <?php gallery("obloom-gallery-1", [
                    "/personal/2021/obloom/interface-1.jpg" => "width",
                    "/personal/2021/obloom/interface-2.jpg" => "width",
                    "/personal/2021/obloom/interface-3.jpg" => "width",
                    "/personal/2021/obloom/interface-4.jpg" => "width",
                ]); ?>
            </div>
            <div class="desktop-25">
                <img path="/personal/2021/obloom/compact-disc.jpg"
                     fix="width">
                <img path="/personal/2021/obloom/floppy-disc.jpg"
                     fix="width">
                <div class="spacing" style="height: 1.5rem;"></div>
                <?php gallery("obloom-gallery-2", [
                    "/personal/2021/obloom/posters-1.jpg" => "width",
                    "/personal/2021/obloom/posters-2.jpg" => "width",
                ]); ?>
            </div>
            <div class="desktop-25 text">
                <div class="text">
                    <div class="highlight">OBLOOM, 2021</div>
                    <div>
                        discusses the unnoticed moments that play an important role in life.
                    </div>
                    <div>
                        six growth phases of plants are used as analogies representing these moments. Corresponding
                        solutions are also proposed so that users will be reminded of the fragmented moments that were
                        once forgotten through these supplies.
                    </div>
                </div>
            </div>
        </div>
        <div class="section-divider"></div>
        <div class="section" id="utopia">
            <div class="desktop-15 empty"></div>
            <div class="desktop-1-2 text">
                <img path="/personal/2020/utopia/artboard-2.jpg"
                     fix="width">
                <div class="text">
                    <div class="highlight">UTOPIA, 2020</div>
                    <div>
                        is about childhood trauma and utopian aspirations. It seeks to understand and express the
                        lasting impact of adverse family experiences on growth.
                    </div>
                    <div>
                        it explores personal narratives through four chapters, drawing knowledge from media memory
                        theories. Through material and textual experimentation, it aims to challenge societal norms and
                        envision a utopian future free from violence and pain.
                    </div>
                </div>
            </div>
            <div class="desktop-35">
                <?php gallery("utopia-gallery", [
                    "/personal/2020/utopia/artboard-1-copy-2.jpg" => "width",
                    "/personal/2020/utopia/artboard-1-copy-1.jpg" => "width",
                    "/personal/2020/utopia/artboard-1-copy-5.jpg" => "width",
                ]); ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "../components/footer.php"; ?>
</body>
</html>
