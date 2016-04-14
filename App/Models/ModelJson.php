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



    public function salvaDados($o)
    {
        try{

            $stmt = $this->conn->prepare("INSERT INTO logDiscos (id_cliente, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (:id_cliente, :local, :particao, :total, :usado, :disponivel, :porcentagem, :data, :horario);");
            $stmt->bindValue(":id_cliente", $o->idCliente);
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
