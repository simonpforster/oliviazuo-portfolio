<?php

class Config
{
    private static $obj;

    public $imageResizer;

    final private function __construct()
    {
        $this->imageResizer = getenv("IMAGE_RESIZER");
    }

    public static function get(): Config
    {
        if (!isset(self::$obj)) {
            self::$obj = new Config();
        }
        return self::$obj;
    }
}

echo '<script type="text/javascript">const config = ' .
    json_encode(Config::get()) .
    "</script>";

?>
