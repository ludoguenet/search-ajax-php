<?php

namespace Src\Controllers\Admin;

use Src\App;
use Src\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        if (!App::getApp()->getAuth()->isLogged()) {
            header('HTTP/1.0 403 Forbidden');
            die();
        }
    }

}
