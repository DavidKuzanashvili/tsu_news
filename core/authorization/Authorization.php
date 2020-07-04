<?php


class Authorization
{
    public static function Authorize()
    {
        $identity = $_COOKIE['identity'];
    }
}