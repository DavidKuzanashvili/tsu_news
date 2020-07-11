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
                $fileInfo = $this->uploadImage();

                if (!empty($fileInfo['errorMessages'])) {
                    $news = new News();
                    $news->id = $id;
                    $news->title = $_POST['title'];
                    $news->description = $_POST['description'];
                    $news->image = $fileInfo['fileName'];
                    $fileErrors = $fileInfo['errorMessages'];
                    $result = [
                        'model' => $news,
                        'errors' => $fileErrors
                    ];
                    return view("news/createNews", compact('result'));
                }

                if ($id == 0) {
                    $data = [
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'createDate' =>  date('m/d/Y'),
                        'image' => $fileInfo['fileName']
                    ];

                    App::get('database')->add('news', $data);
                } else {
                    $data = [
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'image' => $fileInfo['fileName']
                    ];
                    $r = App::get('database')->update('news', $data, "id='{$id}'");
                }

                redirect('news');
            }
            else {
                $id = !empty($_GET['id']) ? $_GET['id'] : 0;
                $news = App::get('database')->firstOrDefault('news', "id='{$id}'", 'News');
                $result = [
                  'model' => $news,
                  'errors' => array()
                ];
                return view("news/createNews", compact('result'));
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

    private function uploadImage()
    {
        $target_dir = "public/uploads/";
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $errorMessages = array();
        $messages = array();

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                array_push($messages,"File is an image - " . $check["mime"] . ".");
                $uploadOk = 1;
            } else {
                array_push($errorMessages,"File is not an image.");
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            array_push($errorMessages, "Sorry, file already exists.");
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            array_push($errorMessages,"Sorry, your file is too large.");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            array_push($errorMessages,"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            array_push($errorMessages,"Sorry, your file was not uploaded.");
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                array_push($messages,"The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
            } else {
                array_push($errorMessages,"Sorry, there was an error uploading your file.");
            }
        }

        return [
            'errorCode' => $uploadOk,
            'errorMessages' => $errorMessages,
            'successMessages' => $messages,
            'fileName' => $fileName
        ];
    }
}