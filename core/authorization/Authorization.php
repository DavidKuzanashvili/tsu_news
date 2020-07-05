<?php


class Authorization
{
    public static function Authorize($role = '', $redirectUrl = '')
    {
        $identity = $_COOKIE['identity'];
        $result = unserialize($identity);
        $userRole = $_COOKIE['userRole'];

        if (!empty($userRole) && !empty($role)) {
            if ($userRole != $role)
                redirect(!empty($redirectUrl) ? $redirectUrl : 'access-denied');
        }

        if (!empty($result) && isset($result))
        {
            $verified = Crypto::verify($result['secret']);

            if (!$verified) redirect(!empty($redirectUrl) ? $redirectUrl : 'access-denied');
        }
        else {
            redirect(!empty($redirectUrl) ? $redirectUrl : 'access-denied');
        }
    }
}