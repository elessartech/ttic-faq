<?php
class Router {


    const DEFAULT_CONTROLLER = 'index';
    const DEFAULT_ACTION = 'index';

    
    public static function run($db, $Twig)
    {
        $url = $_SERVER['REQUEST_URI'];
        $route = array('index' => Router::DEFAULT_CONTROLLER, 'controller' => Router::DEFAULT_ACTION);
        $url = explode('/', $url);
        $url = array_filter($url);
        if (count($url) > 2) {
            $route['index'] = $url[1];
            $route['controller'] = $url[3];
        } else if (count($url) > 1) $route['index'] = $url[1];

        $controllerName = $route['controller'];
		
        $controllerClass = ucfirst(strtolower($controllerName)) . 'Controller';
        $controllerPath = 'controllers/' . $controllerClass . '.php';
        if (!is_file($controllerPath)) throw new Exception("No such controller under path " . $controllerPath);
        include_once $controllerPath;
        if (!class_exists($controllerClass)) throw new Exception("No class has been found!" . $controllerClass);
		
        $controllerObject = new $controllerClass($db, $Twig);
        $actionName = $controllerName . 'Action';
		
        if (!method_exists($controllerObject, $actionName)) throw new Exception("No action!");
        $controllerObject->$actionName();
    
    }
}
?>


