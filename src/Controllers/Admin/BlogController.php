<?php

namespace Src\Controllers\Admin;

class BlogController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('post');
    }

    public function index()
    {
        $posts = $this->post->all();
        $this->render('admin.index', compact('posts'));
    }

    public function edit(int $id)
    {
        if (!empty($_POST)) {
            $this->post->update($id, $_POST);
        }
        $post = $this->post->find($id);
        $this->render('admin.posts.edit', compact('post'));
    }

    public function create()
    {
        if (!empty($_POST)) {
            $this->post->create($_POST);
        }
        $this->render('admin.posts.create');
    }

    public function delete()
    {
        if (!empty($_POST['id'])) {
            $this->post->delete($_POST['id']);
        }
        $page = $_SERVER["HTTP_REFERER"];
        header("location: $page");
    }
}
