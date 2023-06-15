<?php

use App\Controllers\ProductController;
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});
$router->get('list-product',[ProductController::class,'getProduct']);
$router->get('add-product',[ProductController::class,'add']);
$router->post('post-product',[ProductController::class,'postProduct']);
$router->get('detail-product/{id}',[ProductController::class,'detail']);
$router->post('edit-product/{id}',[ProductController::class,'editProduct']);
$router->get('delete-product/{id}',[ProductController::class,'delete']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>