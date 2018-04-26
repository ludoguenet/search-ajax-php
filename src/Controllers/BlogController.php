<?php

namespace Src\Controllers;

use Src\Controllers\Controller;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->loadModel('post');
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