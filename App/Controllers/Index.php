<?php

namespace App\Controllers;

use src\Pages\Render;
use App\Models\ModelLogin;

class Index extends Render
{
    public function index()
    {
      $this->render('index');
    }

    public function login()
    {
      $this->render('login', false);
    }

    public function verificaLogin()
    {
      $dataLogin = file_get_contents("php://input");

      $dataLogin = json_decode($dataLogin);

      $loga = new ModelLogin();
      $loga->setEmail($dataLogin->lEmail);
      $loga->setSenha($dataLogin->lSenha);
      $resLogin = $loga->logar();

      if ($resLogin == True){
        $this->setSession($dataLogin);
        $this->setCookie($dataLogin);
      } else {
        echo "Erro, usuário ou senha são inválidos!!!\n";
      }
    }

    public function logout()
    {
      session_start();
      session_destroy();

      unset($_COOKIE["principal"]);
      setcookie("principal", "logout", time()-1);

      header('Location: /');
    }

    private function setSession($dataLogin)
    {
      session_start();
      $_SESSION['email'] = $dataLogin->lEmail;
      $_SESSION['senha'] = $dataLogin->lSenha;
      session_cache_expire(25 * 24 * 60);
    }

    private function setCookie($dataLogin)
    {
      setcookie('principal', $dataLogin->lEmail, (time() + (3 * 24 * 3600)));
    }

    public function error404()
    {
      header("HTTP/1.0 404 Not Found");
      $this->render('error404', 0);
    }

}
