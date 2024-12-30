<?php

function gallery(
    string $id,
    array $paths,
    bool $fix_width = true,
    bool $contentCover = false
): void {
    $fix = $fix_width ? "width" : "height";
    echo '<div class="gallery" id="' .
        $id .
        '" fix="' .
        $fix .
        '" cover="' .
        $contentCover .
        '">';
    echo '<div class="arrow-left-container"><img class="static arrow-left" src="./resources/icons/arrow.svg"></img></div>';
    echo '<div class="arrow-right-container"><img class="static arrow-right" src="./resources/icons/arrow.svg"></img></div>';
    foreach ($paths as $path => $fix) {
        echo '<img path="' . $path . '" fix="' . $fix . '"/>';
    }
    echo "</div>";
}

echo '<script src="./resources/js/solid-gallery.js" type="module"></script>';
