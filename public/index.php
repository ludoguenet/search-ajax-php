<?php
require '../bootstrap/bootstrap.php';

// Initialisation des routes
$router = new \Src\Routing\Router($_GET['url'] ?? null);

// Routes
$router->get('/', 'Src\\Controllers\\BlogController@index');
$router->get('blog', 'Src\\Controllers\\BlogController@blog');
$router->get('posts', 'Src\\Controllers\\BlogController@ajax');
$router->get('login', 'Src\\Controllers\\BlogController@login');
$router->post('login', 'Src\\Controllers\\BlogController@login');

// Admin routes
$router->get('admin', 'Src\\Controllers\\Admin\\BlogController@index');
$router->get('admin/posts/edit/:id', 'Src\\Controllers\\Admin\\BlogController@edit');
$router->post('admin/posts/edit/:id', 'Src\\Controllers\\Admin\\BlogController@edit');
$router->get('admin/posts/create', 'Src\\Controllers\\Admin\\BlogController@create');
$router->post('admin/posts/create', 'Src\\Controllers\\Admin\\BlogController@create');
$router->post('admin/posts/delete', 'Src\\Controllers\\Admin\\BlogController@delete');

// Lancement du système de routing
$router->run();
