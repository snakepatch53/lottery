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

$router->add('/login', function () {
    global $proyect;
    $currentPage = 'login';
    include('./model/library/session.middleware.php');
    include('./view/page.public/login.php');
}, ['GET']);

$router->add('/(|inicio|home|index|index.php)', function () {
    global $proyect;
    $currentPage = 'home';
    include('./model/library/session.middleware.php');
    include('./view/page.public/inicio.php');
}, ['GET']);

$router->add('/users', function () {
    global $proyect;
    $currentPage = 'users';
    include('./model/library/session.middleware.php');
    include('./view/page.public/users.php');
}, ['GET']);

$router->add('/tables', function () {
    global $proyect;
    $currentPage = 'tables';
    include('./model/library/session.middleware.php');
    include('./view/page.public/tables.php');
}, ['GET']);

$router->add('/tables/([0-9])', function ($lottery_table_id) {
    global $proyect;
    $currentPage = 'tables';
    include('./model/library/session.middleware.php');
    include('./model/library/table.middleware.php');
    include('./view/page.public/table.php');
}, ['GET']);

// ERROR 404
$router->add('/.*', function () {
    global $proyect;
    $url = $proyect['url'] . "home";
    echo "
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <h3 style='text-align:center; font-family:consolas'>LUGAR NO ENCONTRADO</h3>
        <br/>
        <a href='$url' style='text-align:center; display:block; font-family:consolas'>Return to home</a>
    ";
});

// EJECUTAR RUTAS
$router->route();
