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

            $stmt = $this->conn->prepare("SELECT id_cliente, id_servidor FROM servidores WHERE id_cliente = (:idCliente) AND id_servidor = (:idServidor)");
            $stmt->bindValue(":idCliente", $o->idCliente);
            $stmt->bindValue(":idServidor", $o->idServidor);
            $stmt->execute();
            $row = $stmt->rowCount();

            if ($row > 0) {
                return True;
            }

            return False;

        } catch (Exception $e) {
            echo "ERRO: nao foi possivel consultar as informações do cliente ou do Servidor!\n".$e->getMessage();
        }
    }

    public function verificaDisco($o)
    {
        try{

            $stmt = $this->conn->prepare("SELECT id_disco FROM discos WHERE id_servidor = (:id_servidor) AND local = (:local);");
            $stmt->bindValue(":id_servidor", $o->idServidor);
            $stmt->bindValue(":local", $o->local);
            $stmt->execute();
            $row = $stmt->rowCount();

            if ($row == 0) {
                return True;
            }

            return $stmt->fetch();

        } catch(Exception $e){
            echo "ACAO: ".$o->acao."ERRO: as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }

    public function salvaDisco($o)
    {
        try{

            $stmt = $this->conn->prepare("INSERT INTO discos (id_servidor, local, particao) VALUES (:id_servidor, :local, :particao);");
            $stmt->bindValue(":id_servidor", $o->idServidor);
            $stmt->bindValue(":local", $o->local);
            $stmt->bindValue(":particao", $o->particao);
            $stmt->execute();

            print_r($o);

            echo "ACAO: ".$o->acao.", As informaçoes foram gravadas com sucesso";

        } catch(Exception $e){
            echo "ACAO: ".$o->acao."ERRO: as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }

    }

    public function salvaLogDisco($o, $idDisco)
    {
        try{

            $stmt = $this->conn->prepare("INSERT INTO logDiscos (id_disco, total, usado, porcentagem, data, horario) VALUES (:id_disco, :total, :usado, :porcentagem, :data, :horario);");
            $stmt->bindValue(":id_disco", $idDisco);
            $stmt->bindValue(":total", $o->total);
            $stmt->bindValue(":usado", $o->usado);
            $stmt->bindValue(":porcentagem", $o->porcentagem);
            $stmt->bindValue(":data", $o->data);
            $stmt->bindValue(":horario", $o->horario);
            $stmt->execute();

            print_r($o);

            echo "ACAO: ".$o->acao.", As informaçoes foram gravadas com sucesso";

        } catch(Exception $e){
            echo "ACAO: ".$o->acao."ERRO: as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }
}
