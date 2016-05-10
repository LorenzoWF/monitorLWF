<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelDisco
{
    private $conn;

    public function __construct()
    {
        $conn = new ConnectDB();
        $this->conn = $conn->getConn();
    }

    public function estDiscosFullClienteServidor()
    {
        try{

            $stmt = $this->conn->query("select * from mostradiscos;");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }
}
