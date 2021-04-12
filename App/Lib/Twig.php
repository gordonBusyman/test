<?php
namespace App\Lib;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Twig class
 *
 * Contains static getter and setter for Twig env
 */
class Twig
{
    public static $TWIG_ENV;


    public static function set($twigPath)
    {
        $loader  = new FilesystemLoader($twigPath);
        $twigEnv = new Environment($loader);

        self::$TWIG_ENV = $twigEnv;
    }

    public static function get()
    {
        return self::$TWIG_ENV;
    }
}
