<?php

namespace App;

class Init
{
    private $routes;

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    private function initRoutes()
    {
        $this->routes['home'] = array('route' => '/', 'controller' => 'index', 'action' => 'index');
        $this->routes['json'] = array('route' => '/json', 'controller' => 'json', 'action' => 'recebeJson');
        $this->routes['discos'] = array('route' => '/discos', 'controller' => 'discos', 'action' => 'mostraDiscos');
    }

    private function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

    private function run($url)
    {
        array_walk($this->routes, function($route) use($url){

            if ($url == $route['route']){
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                $controller = new $class;
                $controller->$route['action']();
            }

        });

    }
}