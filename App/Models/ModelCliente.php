<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelCliente
{
    private $conn;
    private $id_cliente;
    private $nome;

    public function __construct()
    {
        $conn = new ConnectDB();
        $this->conn = $conn->getConn();
    }

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function clientesFull()
    {
        try{

            $stmt = $this->conn->query("SELECT * FROM clientes");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }

    public function cadastrarCliente()
    {
        try{

            $stmt = $this->conn->prepare("INSERT INTO clientes (nome) VALUES (:nome);");
            $stmt->bindValue(":nome", $this->nome);
            $stmt->execute();

            return 1;

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }
}
