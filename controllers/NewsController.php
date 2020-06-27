<?php


class NewsController
{
    public function news()
    {
        $title = isset($_GET['slug']) ? $_GET['slug'] : null;
        if (!empty($title)) {

            return view('news.slug', compact('title'));
        }
        return view('news');
    }
}