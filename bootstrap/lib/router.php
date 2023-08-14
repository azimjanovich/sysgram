<?php


function handle_request()
{
    $routes = [];
    foreach (glob(SYSGRAM_DIR .  '/routers/*.php') as $routers) {
        $routes += require_once $routers;
    }

    $route = trim($_SERVER['REQUEST_URI'], '/');
    if (strlen($route) < 1) {
        $route = "/";
    }

    if (array_key_exists($route, $routes)) {
        $controller = new $routes[$route][0];
        $action = $routes[$route][1];
        $controller->$action();
    } else {
        echo "Not found";
    }
}
