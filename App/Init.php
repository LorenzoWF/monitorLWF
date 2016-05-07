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
        //PAGINAS DE ACESSO
        $this->routes['home'] = array('route' => '/', 'controller' => 'index', 'action' => 'index');
        $this->routes['login'] = array('route' => '/login', 'controller' => 'index', 'action' => 'login');
        $this->routes['logout'] = array('route' => '/logout', 'controller' => 'index', 'action' => 'logout');
        $this->routes['discos'] = array('route' => '/discos', 'controller' => 'discos', 'action' => 'mostraDiscos');
        $this->routes['clientes'] = array('route' => '/clientes', 'controller' => 'clientes', 'action' => 'mostraClientes');

        //PAGINAS DE CONTROLE
        $this->routes['json'] = array('route' => '/json', 'controller' => 'json', 'action' => 'recebeJson');
        $this->routes['getClientes'] = array('route' => '/getClientes', 'controller' => 'clientes', 'action' => 'getClientes');
        $this->routes['setCliente'] = array('route' => '/setCliente', 'controller' => 'clientes', 'action' => 'setCliente');
        $this->routes['getDiscos'] = array('route' => '/getDiscos', 'controller' => 'discos', 'action' => 'getDiscos');

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
