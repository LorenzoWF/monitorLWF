<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelCliente
{
    public function __construct()
    {
        $conn = new ConnectDB();
        $this->conn = $conn->getConn();
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
}
