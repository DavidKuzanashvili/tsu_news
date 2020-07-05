<?php


class NewsController
{
    public function news()
    {
        try {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            if (!empty($id)) {
                $news = App::get('database')->firstOrDefault('news', "id='{$id}'", 'News');
                //dd($news);
                return view('news/news.slug', compact('news'));
            }

            $news = App::get('database')->all('news', '', 'News');
            return view('news/news', compact('news'));

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function createNews()
    {
        try {
            if (isset($_POST['createNews'])) {
                $id = $_POST['id'];
                if ($id == 0) {
                    $data = [
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'createDate' =>  date('m/d/Y')
                    ];

                    App::get('database')->add('news', $data);
                } else {
                    $data = [
                        'title' => $_POST['title'],
                        'description' => $_POST['description']
                    ];
                    $r = App::get('database')->update('news', $data, "id='{$id}'");
                }

                redirect('news');
            }
            else {
                $id = !empty($_GET['id']) ? $_GET['id'] : 0;
                $news = App::get('database')->firstOrDefault('news', "id='{$id}'", 'News');
                return view("news/createNews", compact('news'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function deleteNews() {
        try {
            $id = $_GET['id'];
            if (!empty($id)) {
                $r = App::get('database')->delete('news', "id='{$id}'");
                //dd($r);
                return redirect('news');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}