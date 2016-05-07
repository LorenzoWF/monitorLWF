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

      if ($resLogin == 1){
        $this->setSession();
        $this->setCookie();
      } else {
        echo "Erro, usuário ou senha são inválidos!!!";
      }
    }

    private function logout()
    {

    }

    private function setSession()
    {
      session_start();
    }

    private function setCookie()
    {
        echo "VERIFICA COOKIE";
    }

}
