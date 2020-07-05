<?php


class AuthService
{
    public function persistCredentials($userName, $role = '')
    {
        $data = [
            'userName' => $userName,
            'secret' => Crypto::encrypt('This_is_site_secret')
        ];

        $s = serialize($data);

        setcookie('identity', $s);
        setcookie('userRole', $role);
    }
}