<?php

namespace Src\Controllers\Admin;

class BlogController extends AdminController
{
    public function index()
    {
        $this->render('admin.index');
    }
}
