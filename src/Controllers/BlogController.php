<?php

namespace Src\Controllers;

use Src\Controllers\Controller;
use Src\App;

class BlogController extends Controller
{
    private $auth;

    public function __construct()
    {
        $this->loadModel('post');
        $this->auth = App::getApp()->getAuth();
    }

    public function index()
    {
        $this->render('blog.index');
    }

    public function blog()
    {
        $posts = $this->post->all();
        $this->render('blog.posts', compact('posts'));
    }

    public function login()
    {
        if (!empty($_POST)) {
            if ($this->auth->login($_POST['username'], $_POST['password'])) {
                header('Location: admin');
            } else {
                echo 'Mauvais identifiants';
            }
        }
        $this->render('blog.login');
    }

    public function ajax()
    {
        if ($this->isAjax()) {
            $q = $_GET['q'] ?? null;
            $posts = $this->post->search($q);
            echo json_encode($posts);
        } else {
            header('HTTP/1.0 404 Not Found', true);
        }
    }
}
