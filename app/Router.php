<?php

class Router {

    const DEFAULT_OPTION = 'Index';
    const DEFAULT_ACTION = 'Check';

    public static function run($db, $Twig)
    {
        $url = preg_split('/\//', $_SERVER['REQUEST_URI'], -1, PREG_SPLIT_NO_EMPTY);
        $route = array('index' => Router::DEFAULT_OPTION, 'controller' => Router::DEFAULT_OPTION, 'action' => Router::DEFAULT_ACTION, 'id'=>null);
        if (count($url) > 2) 
        {
            $route['index'] = $url[1];
            $route['controller'] = $url[2];
            $route['action'] = $url[3];
            $route['id'] = $url[4];
        } 
        else if (count($url) > 1) $route['controller'] = $url[1];

        $controllerName = ucfirst($route['controller']);
        if ($controllerName != 'AdminEditQuestion') $specificActionName = $controllerName . ucfirst($route['action']);

        $controllerClass = $controllerName . 'Controller';
        $controllerPath = 'controllers/' . $controllerClass . '.php';

        if (!is_file($controllerPath)) throw new Exception("No such controller under path " . $controllerPath);
        
        include_once $controllerPath;

        if (!class_exists($controllerClass)) throw new Exception("No class has been found!" . $controllerClass);
		
        $controllerObject = new $controllerClass($db, $Twig);
        $actionName = $controllerName . 'Action';
		
        if (!method_exists($controllerObject, $actionName)) throw new Exception("No action! " . $controllerName);
        $controllerObject->$actionName();

        if (isset($route['action']) && $controllerName != Router::DEFAULT_OPTION && strlen($route['id']) < 1 && $controllerName != 'AdminEditQuestion') 
        {
            $controllerObject->$specificActionName();
        }
        else if (isset($route['action']) && $controllerName != Router::DEFAULT_OPTION && strlen($route['id']) >= 1)
        {
            $controllerObject->$specificActionName($route['id']);
        }
    }
}
?>


