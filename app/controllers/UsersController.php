<?php


class UsersController
{
    public function index()
    {
        try {
            $users = App::get('database')->all('users', '', 'User');
            return view('users/index', compact('users'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function export()
    {
        try {
            $users = App::get('database')->all('users', '', 'User');

            $file = "users.txt";
            $txt = fopen($file, "w") or die("Unable to open file!");

            $header = "Id/First name/Last name/email/email verified\n\n";
            fwrite($txt, $header);
            foreach ($users as $user) {
                $verifiedTxt = $user->emailConfirmed ? 'verified' : 'not yet';
                $text = "{$user->id}/{$user->firstName}/{$user->lastName}/{$user->email}/{$verifiedTxt}\n";
                fwrite($txt, $text);
            }

            fclose($txt);

            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/plain");

            readfile($file);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}