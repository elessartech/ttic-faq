<?php
class Router {


    const DEFAULT_OPTION = 'index';
    const DEFAULT_ACTION = 'Check';


    
    public static function run($db, $Twig)
    {
        $url = preg_split('/\//', $_SERVER['REQUEST_URI'], -1, PREG_SPLIT_NO_EMPTY);
        $route = array('index' => Router::DEFAULT_OPTION, 'controller' => Router::DEFAULT_OPTION, 'action' => Router::DEFAULT_ACTION);
        #$url = explode('/', $url);
        #$url = array_filter($url);
        if (count($url) > 2) {
            $route['index'] = $url[1];
            $route['controller'] = $url[2];
            $route['action'] = $url[3];
        } else if (count($url) > 1) $route['controller'] = $url[1];

        
        $controllerName = $route['controller'];
        $specificActionName = ucfirst($controllerName) . ucfirst($route['action']); 
		
        $controllerClass = ucfirst(strtolower($controllerName)) . 'Controller';
        $controllerPath = 'controllers/' . $controllerClass . '.php';
        if (!is_file($controllerPath)) throw new Exception("No such controller under path " . $controllerPath);
        include_once $controllerPath;
        if (!class_exists($controllerClass)) throw new Exception("No class has been found!" . $controllerClass);
		
        $controllerObject = new $controllerClass($db, $Twig);
        $actionName = $controllerName . 'Action';
		
        if (!method_exists($controllerObject, $actionName)) throw new Exception("No action! " . $route['controller']);
        $controllerObject->$actionName();

        if (ucfirst($route['action']) == Router::DEFAULT_ACTION) $controllerObject->$specificActionName();
    
    }
}
?>


