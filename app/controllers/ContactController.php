<?php


class ContactController
{
    public function index()
    {
        try {
            $contacts = App::get('database')->all('contacts', '', 'Contact');
            return view('contacts/index', compact('contacts'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function send()
    {
        try {
            $data = [
                'email' => $_POST['email'],
                'name' => $_POST['name'],
                'message' => $_POST['message'],
            ];
            App::get('database')->add('contacts', $data);
            setcookie('Message', 'Ur message was sent');
            redirect($_POST['redirectUrl']);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}