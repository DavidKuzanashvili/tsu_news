<?php

use PHPMailer\PHPMailer\PHPMailer;

class EmailService
{
    private string $host;
    private int $port;
    private string $account;
    private string $password;

    public function __construct($host, $port, $account = '', $password = '')
    {
        $this->host = $host;
        $this->port = $port;
        $this->account = $account;
        $this->password = $password;
    }

    public function send($to, $baseUrl, $userName, $userPassword, $activationCode)
    {
        try {
            $mailBody = sprintf("<p>Hi %s,</p>
               <p>
                    Thanks for Registration. Your password is %s, 
                    This password will work only after your email verification.
               </p>
               <p>
                    Please Open this link to verified your email address - 
                    <a href='%s/E-mail-verification?activationCode=%s'>
                        Verify email
                    </a>
               <p>
                    Best Regards,
                    <br />
                    TSU news
               </p>", $userName, $userPassword, $baseUrl, $activationCode);

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = $this->host;
            $mail->Port = $this->port;
            $mail->SMTPAuth = !empty($this->account);
            $mail->Username = $this->account;
            $mail->Password = $this->password;
            $mail->SMTPSecure = '';
            $mail->From = 'no-reply@tsu-news.end.tsu.edu.ge';
            $mail->FromName = 'TSU_NEWS';
            $mail->AddAddress($to, $userName);
            $mail->WordWrap = 50;
            $mail->IsHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = $mailBody;

            return $mail->send();
        } catch (Exception $ex) {
            die(var_dump($ex->getMessage()));
        }
    }
}