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
    $senha->senha = $senha;
  }

  public function verificaCliente($o)
  {
      try {

          $stmt = $this->conn->prepare("SELECT id_cliente FROM clientes WHERE id_cliente = (:idCliente)");
          $stmt->bindValue(":idCliente", $o->idCliente);
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
