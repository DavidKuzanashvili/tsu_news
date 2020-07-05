<?php


class ErrorController
{
    public function index()
    {
        return view('error/error');
    }

    public function unauthorized()
    {
        return view('error/unauthorized');
    }
}