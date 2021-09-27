<?php

namespace application\core;
use application\core\View;  // без этой строки тоже работает

abstract class Controller
{
    public $route;
    public $view;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        //var_dump($this->route);
        //debug($this->checkAcl());
        if (!$this->checkAcl())
        {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        //debug($this->model);
    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        //debug($path);
        if (class_exists($path))
        {
            return new $path;
        }
    }

    public function checkAcl()
    {
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';
        //debug($this->acl);
        if($this->isAcl('all'))
        {
            return true;
        }
        elseif(isset($_SESSION['authorize']['id']) and $this->isAcl('authorize'))
        {
            return true;
        }
        elseif(!isset($_SESSION['authorize']['id']) and $this->isAcl('quest'))
        {
            return true;
        }
        elseif(isset($_SESSION['admin']) and $this->isAcl('admin'))
        {
            return true;
        }

        return false;
    }

    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }
}