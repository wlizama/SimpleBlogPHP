<?php 

ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../vendor/autoload.php";
include_once '../config.php';

$baseURL = "";
$baseDIR = str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
$baseURL = 'http://' . $_SERVER['HTTP_HOST'] . $baseDIR;
define('BASE_URL', $baseURL);

// var_dump(BASE_URL);

function render($filename, $params = []){
    ob_start();
    extract($params);
    include $filename;

    return ob_get_clean();
}


$route = $_GET['route'] ?? '/';

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->controller("/", App\Controllers\IndexController::class);
$router->controller("/admin", App\Controllers\Admin\IndexController::class);
$router->controller("/admin/posts", App\Controllers\Admin\PostController::class);



$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER["REQUEST_METHOD"], $route);

echo $response;
