<?php

function gallery(string $id, array $paths, bool $fix_width = true): void
{
    $fix = $fix_width ? "width" : "height";
    echo '<div class="gallery" id="' . $id . '" fix="' . $fix . '">';
    echo '<img class="static arrow-left" src="./resources/icons/arrow.svg"></img>';
    echo '<img class="static arrow-right" src="./resources/icons/arrow.svg"></img>';
    foreach ($paths as $path => $fix) {
        echo '<img path="' . $path . '" fix="' . $fix . '"/>';
    }
    echo "</div>";
}
