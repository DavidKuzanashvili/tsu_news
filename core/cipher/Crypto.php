<?php


class Crypto
{
    private static string $secret = '$2y$%02d$%s';
    private static string $siteSecret = 'This_is_site_secret';

    public static function encrypt($data)
    {
        // Do some encryption staff
        try {

            return static::$siteSecret;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private static function decrypt($cipherText, $secret)
    {
        return static::$siteSecret;
    }

    public static function verify($secret)
    {
        $data = static::decrypt($secret, static::$secret);

        return $data == static::$siteSecret;
    }
}