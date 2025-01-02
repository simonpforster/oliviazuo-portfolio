<?php
require_once (__DIR__ . "/image.php");

function gallery(
    string $id,
    array $paths,
    bool $fix_width = true,
    bool $contentCover = false
): string {
    $fix = $fix_width ? "width" : "height";
    $images = "";
    foreach ($paths as $path => $fix) {
        $images = $images . image($path);
    }
    return <<<HTML
<div class="gallery" id="$id" fix="$fix" cover="$contentCover">
    <div class="arrow-left-container"><img class="static arrow-left" src="./resources/icons/arrow.svg"></div>
    <div class="arrow-right-container"><img class="static arrow-right" src="./resources/icons/arrow.svg"></div>
    $images
</div>
HTML;

}

function galleryScript(): void {
    echo '<script src="./resources/js/solid-gallery.js" type="module"></script>';
}
