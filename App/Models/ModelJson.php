<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelJson
{
    private $conn;

    public function __construct()
    {
      $conexao = new \src\ServiceDB\ConnectDB();
      $this->conn = $conexao->getConn();
    }

    public function verificaClienteServidor($o)
    {
        try {

            $stmt = $this->conn->prepare("SELECT * FROM servidores WHERE id_cliente = (:id_cliente) AND id_servidor = (:id_servidor);");
            $stmt->bindValue(":id_cliente", $o->idCliente);
            $stmt->bindValue(":id_servidor", $o->idServidor);
            $stmt->execute();
            $row = $stmt->rowCount();

            if ($row > 0) {
                return True;
            }

            return False;

        } catch (Exception $e) {
            echo "ERRO 11: nao foi possivel consultar o servidor ou o cliente!\n".$e->getMessage();
        }
    }


    public function insertLogDisco($o)
    {
        try{

            $stmt = $this->conn->prepare("INSERT INTO logDiscos (id_servidor, id_cliente, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (:id_servidor, :id_cliente, :id_local, :local, :particao, :total, :usado, :disponivel, :porcentagem, :data, :horario);");
            $stmt->bindValue(":id_servidor", $o->idServidor);
            $stmt->bindValue(":id_cliente", $o->idCliente);
            $stmt->bindValue(":id_local", $o->idLocal);
            $stmt->bindValue(":local", $o->local);
            $stmt->bindValue(":particao", $o->particao);
            $stmt->bindValue(":total", $o->total);
            $stmt->bindValue(":usado", $o->usado);
            $stmt->bindValue(":disponivel", $o->disponivel);
            $stmt->bindValue(":porcentagem", $o->porcentagem);
            $stmt->bindValue(":data", $o->data);
            $stmt->bindValue(":horario", $o->horario);
            $stmt->execute();

            print_r($o);

            echo "As informaçoes foram gravadas com sucesso";

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }

    }
}
