<?php


class CategoryController
{
    public function index() {
        try {
            $categories = App::get('database')->all('news_categories', '', 'Category');
            return view('categories/index', compact('categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function createCategory() {
        try {
            if (isset($_POST['createCategory'])) {
                $id = !isset($_POST['id']) ? $_POST['id'] : 0;
                $data = [
                  'id' => $id,
                  'title' => $_POST['title']
                ];
                if ($id == 0) {
                    App::get('database')->add('news_categories', $data);
                } else {
                    App::get('database')->update('news_categories', $data, "id='{$id}'");
                }
                redirect('categories');
            } else {
                $id = !empty($_GET['id']) ? $_GET['id'] : 0;
                $category = App::get('database')->firstOrDefault('news_categories', "id='{$id}'", 'Category');
                $result = [
                    'model' => $category,
                    'errors' => array()
                ];
                return view("categories/category", compact('result'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete() {
        try {
            $id = $_GET['id'];
            if (!empty($id)) {
                App::get('database')->delete('news_categories', "id='{$id}'");
                setcookie('Message', 'Remember u can only delete categories that aren\'t assigned to any news.');
                redirect('categories');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}