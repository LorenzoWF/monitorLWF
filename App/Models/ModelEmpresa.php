<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelEmpresa
{
    public function __construct()
    {
        $conn = new ConnectDB();
        $this->conn = $conn->getConn();
    }

    public function selecionarEmpresa($id_cliente)
    {
        try{

            $stmt = $this->conn->prepare("SELECT nome FROM cliente WHERE id_cliente = (:id_cliente);");
            $stmt->bindValue(":id_cliente", $id_cliente)
            return $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }


}
