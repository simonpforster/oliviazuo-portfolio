<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use Libsql\Database;

class ShopDb
{
    private static $obj;

    public $db;

    final private function __construct()
    {
        try {
            $this->db = new Database(
                path: "../../database/portfolio.db",
                url: getenv("TURSO_URL"),
                authToken: getenv("TURSO_AUTH_TOKEN"),
                syncInterval: 300 // every 3 seconds
            );
            $this->db->sync();
        } catch (\Exception $e) {
            error_log("Database connection error: " . $e->getMessage());
            throw new \RuntimeException(
                "Failed to connect to database: " . $e->getMessage()
            );
        }
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
                    id INT PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL UNIQUE,
                    description TEXT NOT NULL,
                    price INT NOT NULL,
                    image TEXT NOT NULL
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
