<?php
namespace App\Lib;

use App\Lib\Config;

/**
 * DB class
 *
 * Singleton DB provider
 */
class DB
{
    private static $DB;

    public static function getInstance()
    {
        if (isset($DB)) {
            return self::$DB;
        }


        // Create connection
        $conn = new \mysqli(
            Config::get('MYSQL_HOST', ''),
            Config::get('MYSQL_USERNAME', ''),
            Config::get('MYSQL_PASSWORD', ''),
            Config::get('MYSQL_DB_NAME', '')
        );

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
