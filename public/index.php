<?php
require '../bootstrap/bootstrap.php';

// Initialisation des routes
$router = new \Src\Routing\Router($_GET['url'] ?? null);

// Routes
$router->get('/', 'Src\\Controllers\\BlogController@index');
$router->get('blog', 'Src\\Controllers\\BlogController@blog');
$router->get('posts', 'Src\\Controllers\\BlogController@ajax');

// Lancement du système de routing
$router->run();

