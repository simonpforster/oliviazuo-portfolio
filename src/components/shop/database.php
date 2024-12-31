<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use Libsql\Database;

class ShopDb
{
    private static $obj;

    public $db;

    final private function __construct()
    {
        $this->db = new Database(
            path: "../database/portfolio.db",
            url: getenv("TURSO_URL"),
            authToken: getenv("TURSO_AUTH_TOKEN"),
            syncInterval: 100 // every second
        );
    }

    public static function get(): ShopDb
    {
        if (!isset(self::$obj)) {
            self::$obj = new ShopDb();
        }
        return self::$obj;
    }

    public function initializeSchema()
    {
        try {
            $this->db->execute("
                CREATE TABLE IF NOT EXISTS products (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL UNIQUE,
                    description TEXT NOT NULL,
                    price INTEGER NOT NULL
                );
            ");
        } catch (\Exception $e) {
            error_log("Schema initialization error: " . $e->getMessage());
            throw new \RuntimeException(
                "Failed to initialize database schema: " . $e->getMessage()
            );
        }
    }
}
