<?php
require __DIR__ . "/inc/bootstrap.php";
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
 
// http://localhost/index.php/test
if ((isset($uri[2]) && $uri[2] == 'test')) {
    require PROJECT_ROOT_PATH . "/Controller/Api/TestController.php";
    $objFeedController = new TestController();
    $objFeedController->action();
}
else{
    header("HTTP/1.1 404 Not Found");
    exit();
}
?>