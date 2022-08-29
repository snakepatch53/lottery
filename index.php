<?php
// ob_start();
include('./config.php');

// if ($_SERVER['HTTPS'] != "on" or strpos($_SERVER['HTTP_HOST'], 'www') !== false) {
//     header("location: " . $proyect['root_absolute']);
// }

include './model/library/Router/Route.php';
include './model/library/Router/Router.php';
include './model/library/Router/RouteNotFoundException.php';

$router = new Router\Router($proyect['name']);

$router->add('/(|inicio|index|index.php)', function () {
    global $proyect;
    $currentPage = 'inicio';
    include('./view/page.public/inicio.php');
}, ['GET']);

// ERROR 404
$router->add('/.*', function () {
    global $proyect;
    echo "404 error";
});

// EJECUTAR RUTAS
$router->route();
