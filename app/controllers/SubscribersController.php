<?php


class SubscribersController
{
    public function index()
    {
        try {
            $subscribers = App::get('database')->all('subscribers', '', 'Subscriber');
            return view('subscribers/index', compact('subscribers'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function subscribe()
    {
        try {
            $data = [
                'email' => $_POST['email']
            ];
            App::get('database')->add('subscribers', $data);
            setcookie('Message', 'U have successfully subscribed tsu news');
            redirect($_POST['redirectUrl']);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}