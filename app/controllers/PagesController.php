<?php


class PagesController
{
    public function home()
    {
        try {
            $news = App::get('database')->all('news', "pinnedToHomePage=1", 'News');

            return view('index', compact('news'));
        } catch (Exception $e) {
            die(var_dump($e->getMessage()));
        }

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