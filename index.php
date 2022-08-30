<?php
// ob_start();
include('./config.php');
// include('./model/library/initialProcess.php');

// if ($_SERVER['HTTPS'] != "on" or strpos($_SERVER['HTTP_HOST'], 'www') !== false) {
//     header("location: " . $proyect['root_absolute']);
// }

include './model/library/Router/Route.php';
include './model/library/Router/Router.php';
include './model/library/Router/RouteNotFoundException.php';

$router = new Router\Router($proyect['name']);

$router->add('/(|inicio|home|index|index.php)', function () {
    global $proyect;
    $currentPage = 'home';
    include('./view/page.public/inicio.php');
}, ['GET']);

$router->add('/users', function () {
    global $proyect;
    $currentPage = 'users';
    include('./view/page.public/users.php');
}, ['GET']);

$router->add('/tables', function () {
    global $proyect;
    $currentPage = 'tables';
    include('./view/page.public/tables.php');
}, ['GET']);

// ERROR 404
$router->add('/.*', function () {
    global $proyect;
    echo "404 error";
});

// EJECUTAR RUTAS
$router->route();
