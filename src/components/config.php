<?php class Config
{
    private static $obj;

    public string $imageResizer;
    public string $shopOpen;

    final private function __construct()
    {
        $this->imageResizer = getenv("IMAGE_RESIZER");
        $this->shopOpen = getenv("SHOP_OPEN");
    }

    public static function get(): Config
    {
        if (!isset(self::$obj)) {
            self::$obj = new Config();
        }
        return self::$obj;
    }
}

function jsConfig(): void
{
    $json = json_encode(Config::get());
    echo <<<HTML
<script type="text/javascript">const config = $json</script>
HTML;
}
