<?php


class PagesController
{
    public function home()
    {
        try {
            $result = App::get('database')->all('news');
        } catch (Exception $e) {
            die(var_dump($e->getMessage()));
        }

        return view('index', compact('result'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}