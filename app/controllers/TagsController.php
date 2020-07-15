<?php


class TagsController
{
    public function index() {
        try {
            $tags = App::get('database')->all('news_tags', '', 'Tag');
            return view('tags/index', compact('tags'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function create() {
        try {
            if (isset($_POST['createTag'])) {
                $id = !isset($_POST['id']) ? $_POST['id'] : 0;
                $data = [
                    'id' => $id,
                    'title' => $_POST['title']
                ];

                if ($id == 0) {
                    App::get('database')->add('news_tags', $data);
                } else {
                    App::get('database')->update('news_tags', $data, "id='{$id}'");
                }
                redirect('tags');
            } else {
                $id = !empty($_GET['id']) ? $_GET['id'] : 0;
                $category = App::get('database')->firstOrDefault('news_tags', "id='{$id}'", 'Tag');
                $result = [
                    'model' => $category,
                    'errors' => array()
                ];
                return view("tags/tag", compact('result'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete() {
        try {
            $id = $_GET['id'];
            if (!empty($id)) {
                App::get('database')->delete('news_tags', "id='{$id}'");
                setcookie('Message', 'Remember u can only delete tags that aren\'t assigned to any news.');
                redirect('tags');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}