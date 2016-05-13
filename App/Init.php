<?php

namespace App;

class Init
{
    private $routes;
    private $flag404 = 1;

    public function __construct()
    {
      $this->initPublicRoutes();

      $session = $this->verificaSession();
      $cookie = $this->verificaCookie();

      if ($session == True && $cookie == True){
        $this->initPagesRoutes();
      } else {
        $this->initLoginRoutes();
      }

      $this->run($this->getUrl());

      if ($this->flag404 == 1){
        $this->error404();
      }

    }

    private function verificaSession()
    {
      session_start();
      if(isset($_SESSION['email'])) {
          return True;
      }

      return False;
    }

    private function verificaCookie()
    {
      if (isset($_COOKIE['principal'])) {
          return True;
      }

      return False;
    }

    private function initPublicRoutes()
    {
      $this->routes['json'] = array('route' => '/json', 'controller' => 'json', 'action' => 'recebeJson');
    }

    private function initLoginRoutes()
    {
      $this->routes['login'] = array('route' => '/', 'controller' => 'index', 'action' => 'login');
      $this->routes['verificaLogin'] = array('route' => '/verificaLogin', 'controller' => 'index', 'action' => 'verificaLogin');
    }

    private function initPagesRoutes()
    {
      //PAGINAS DE ACESSO
      $this->routes['home'] = array('route' => '/', 'controller' => 'index', 'action' => 'index');
      $this->routes['discos'] = array('route' => '/discos', 'controller' => 'discos', 'action' => 'mostraDiscos');
      $this->routes['clientes'] = array('route' => '/clientes', 'controller' => 'clientes', 'action' => 'mostraClientes');

      //PAGINAS APOS ESTAR LOGADO
      $this->routes['logout'] = array('route' => '/logout', 'controller' => 'index', 'action' => 'logout');

      //PAGINAS DE CONTROLE
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
                $this->flag404 = 0;
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                $controller = new $class;
                $controller->$route['action']();
            }

        });

    }

    private function error404()
    {
      $class = "App\\Controllers\\Index";
      $controller = new $class;
      $controller->error404;
    }
}
