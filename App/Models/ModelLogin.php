<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelLogin
{
  private $conn;
  private $email;
  private $senha;

  public function __construct()
  {
    $conexao = new \src\ServiceDB\ConnectDB();
    $this->conn = $conexao->getConn();
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function setSenha($senha){
    $this->senha = $senha;
  }

  public function logar()
  {
      try {

          $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = (:email) AND senha = (:senha);");
          $stmt->bindValue(":email", base64_encode($this->email));
          $stmt->bindValue(":senha", md5($this->senha));
          $stmt->execute();
          $row = $stmt->rowCount();

          if ($row > 0) {
              return True;
          }

          return False;

      } catch (Exception $e) {
          echo "Erro, as informacoes nao foram aprovadas pelo servidor\n".$e->getMessage();
      }
  }
}
