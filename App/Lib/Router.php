<?php
namespace App\Lib;

/**
 * Router class
 *
 * Routing handling utility
 */
class Router
{
    public static function get($route, $callback)
    {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'GET') !== 0) {
            return;
        }
        self::handle($route, $callback);
    }

    public static function post($route, $callback)
    {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') !== 0) {
            return;
        }
        self::handle($route, $callback);
    }

    /**
     * Standard path verification and routing function
     *
     */
    public static function handle($route, $callback)
    {
        if ($route === $_SERVER['REQUEST_URI']) {
            $callback();
        }
    }
}
