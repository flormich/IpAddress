<!DOCTYPE HTML>
<html>
    <head>
        <!-- RAFRAICHIR / ACTUALISATION / REFRESH / RAFRAICHIR / rafraichir / actualiser / refresh / actualisation-->
        <META HTTP-EQUIV="Refresh" CONTENT="300; URL=/public/index.php/ipUpdate">
    </head>
</html>

<?php

use App\Http\Response;

require __DIR__ . '/../vendor/autoload.php';   
    
$content = file_get_contents(__DIR__ . '/../config/route.json');            
$routes = json_decode($content);  
$uri = filter_input(INPUT_SERVER, "REDIRECT_URL");   
$uri = $_SERVER['REQUEST_URI'];  

$method = strtolower($_SERVER['REQUEST_METHOD']);                           
$prefix = "App\\Controller\\";
$response = new Response();

$match = [];

foreach ($routes as $route) {   
    $deleterole = "/" . str_replace("/", "\/", $route->path). "$/";                       
    if ($method === $route->method                    
        && preg_match($deleterole, $uri, $match)) {                     
        $className = $prefix . $route->controller;
        $controller = new $className($response); 
        array_shift($match);          
        $response = $controller->{$route->action}(...$match);    

    }
}
if (!isset($controller)) {
    $response->setStatus(404, "Route Not Found");
    $response->setBody("No route found for the path :" . $uri);
}

header("HTTP/1.1 " . $response->getStatusCode() . " " . $response->getStatusText());  
foreach ($response->getHeader() as $key => $value) {               
    header($key . ": " . $value);                                   
}
echo $response->getBody();