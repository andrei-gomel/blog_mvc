<?php

namespace application\core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        //echo 'Я класс Рутер<br>';
        $arr = require 'application/config/routes.php';

        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
        
        //debug($this->routes);
    }

    public function add($route, $params)
    {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        
        $route = '#^' . $route . '$#';
        
        $this->routes[$route] = $params;
        //debug($this->routes);

    }

    public function match()
    {
        
        if (isset($_SERVER['PATH_INFO']))
        {
            $url = trim($_SERVER['PATH_INFO'], '/');
        }
        else
        {
            $url = '';
        }        
  
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if ($this->match())
        {
            //echo '<p>controller: <b>'  . $this->params['controller'] . '</b></p>';
            //echo '<p>action: <b>' . $this->params['action'] . '</b></p>';
            
            $path = 'application\controllers\\' 
                        . ucfirst($this->params['controller']) 
                        . 'Controller';

            //echo $path . '<br>';

            if (class_exists($path))
            {
                $action = $this->params['action'] . 'Action';

                if (method_exists($path, $action))
                {
                    $controller = new $path($this->params);
                    $controller->$action();
                }
                else
                {
                    View::errorCode(404);
                }
            }
            else
            {
                View::errorCode(404);
            }
        }
        else
        {
            View::errorCode(404);
        }
    }
}