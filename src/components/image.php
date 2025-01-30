<?php
require_once (__DIR__ . "/config.php");



function image(string $path, bool $widthFix = true): string
{
    $fix = $widthFix ? "width" : "height";
    $uri = Config::get()->imageResizer . $path . '?' . $fix . '=4';
    return <<<HTML
    <img src="$uri" path="$path" fix="$fix" class="pixel">
HTML;
}