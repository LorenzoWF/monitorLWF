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

    public function logDiscosFullClienteNome()
    {
        try{

            $stmt = $this->conn->query("SELECT logDiscos.*, clientes.nome FROM logDiscos INNER JOIN clientes ON logDiscos.id_cliente = clientes.id_cliente;");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }

    public function estDiscosFullClienteServidor()
    {
        try{

            $stmt = $this->conn->query("SELECT estDiscos.*, Servidor.nome FROM discos INNER JOIN clientes ON discos.id_cliente = clientes.id_cliente;");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }
}
