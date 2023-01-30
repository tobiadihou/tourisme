<?php
session_start();  
/**
 * Front Controller
 * 
 * PHP version 8.1
 */

// Require the controller class
// require "../app/Controller/Posts.php";

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__); // get the parent directory
    $file = $root . "/" . str_replace("\\", "/", $class) . ".php";

    if (is_readable($file)) {
      require $root . "/" . str_replace("\\", "/", $class) . ".php";
    }
});

/**
 * Routing
 */
    require "../core/Router.php";
    $router = new Core\Router();


    $router->add('', ['controller' => 'UsersControllers', 'action' => 'index']);

    $router->add('blog', ['controller' => 'ContentControllers', 'action' => 'homeArticleControllers']);

    $router->add('register', ['controller' => 'UsersControllers', 'action' => 'register']);

    $router->add('contact', ['controller' => 'UsersControllers', 'action' => 'contact']);

    $router->add('gites', ['controller' => 'UsersControllers', 'action' => 'gites']);

    $router->add('activites', ['controller' => 'UsersControllers', 'action' => 'activite']);

    $router->add('reservation', ['controller' => 'UsersControllers', 'action' => 'reservation']);


    $router->add('singIn', ['controller' => 'UsersControllers', 'action' => 'connet']);

    $router->add('deconnexion', ['controller' => 'UsersControllers', 'action' => 'deconnet']);

    $router->add('profil', ['controller' => 'UsersControllers', 'action' => 'profil']);

    $router->add('dashboard', ['controller' => 'AdminDashboard', 'action' => 'showUser']);

    $router->add('ajoutImage', ['controller' => 'AdminDashboard', 'action' => 'addImage']);

    $router->add('ajoutArticle', ['controller' => 'AdminDashboard', 'action' => 'addArticle']);

    $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
    $router->add('{controller}/{action}');
    $router->add("{controller}/{id:\d+}/{action}");
    $router->add("admin/{controller}/{action}", ["namespace" => "Admin"]);


    $url = $_SERVER['QUERY_STRING'];


    $router->dispatch($_SERVER["QUERY_STRING"]);
