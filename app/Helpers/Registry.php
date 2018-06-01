<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 14/04/2018
 * Time: 18:16
 */

namespace Helpers;

class Registry
{
    private static $container = [];

    public static function existe($key) {
        return isset(self::$container[$key]);
    }

    public static function getValue ($key, $default = "") {

        if (self::existe($key)) {
            return self::$container[$key];
        }
        return $default;
    }

    public static function setValue ($key, &$value = "")
    {
        self::$container[$key] = $value;
    }
}