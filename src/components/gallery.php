<?php


function gallery(string $id, array $paths): void
{
    echo '<div class="gallery" id="' . $id . '">';
    foreach ($paths as $path => $fix) {
        echo '<img path="' . $path . '" fix="' . $fix . '"/>';
    }
    echo '</div>';
}