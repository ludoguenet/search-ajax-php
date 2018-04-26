<?php

namespace Src\Controllers;

use Src\App;


class Controller
{
    protected $defaultPath = WEBROOT . 'views/template/default.php';
    protected $viewPath = WEBROOT . 'views/';

    protected function render(string $path, array $params = null) : void
    {
        ob_start();
        if ($params) {
            extract($params);
        }
        if (preg_match('#([\.])#', $path)) {
            $path = str_replace('.', '/', $path);
        }
        require $this->viewPath . $path . '.php';
        $content = ob_get_clean();
        require $this->defaultPath;
    }

    protected function loadModel($model_name)
    {
        $class_name = 'Src\\Models\\' . ucfirst($model_name) . 'Model';
        $app = App::getApp();
        $this->$model_name = new $class_name($app->getMySQLFactory());
    }

    protected function isAjax()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }
}