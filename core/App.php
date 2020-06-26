<?php

class App
{
    protected static $registry;

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public static function get($key)
    {
        if (!key_exists($key, static::$registry))
        {
            throw new Exception("No {$key} is bound to the container.");
        }

        return static::$registry[$key];
    }
}