<?php
define('PROJECT_ROOT_PATH', __DIR__);
require __DIR__."/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

// http://localhost/index.php/test
if ((isset($uri[2]) && $uri[2] == 'test')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/TestController.php";
    $objFeedController = new TestController();
    $objFeedController->action();
}
// http://localhost/index.php/dish
else if ((isset($uri[2]) && $uri[2] == 'dish')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/dishController.php";
    $objFeedController = new dishController();
    $objFeedController->action();
}
else{
    header("HTTP/1.1 404 Not Found");
    exit();
}
?>