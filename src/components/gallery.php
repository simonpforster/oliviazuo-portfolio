<?php

function gallery(string $id, array $paths, bool $fix_width = true): void
{
    $fix = $fix_width ? "width" : "height";
    echo '<div class="gallery" id="' . $id . '" fix="' . $fix . '">';
    echo '<object class="arrow-left" data="./resources/icons/arrow.svg"></object>';
    echo '<object class="arrow-right" data="./resources/icons/arrow.svg"></object>';
    foreach ($paths as $path => $fix) {
        echo '<img path="' . $path . '" fix="' . $fix . '"/>';
    }
    echo "</div>";
}
