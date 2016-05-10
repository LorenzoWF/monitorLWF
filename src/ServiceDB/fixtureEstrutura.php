<?php

require_once 'ConnectDB.php';

$conexao = new src\ServiceDB\ConnectDB();
$conn = $conexao->getConn();

$conn->query("DROP TABLE IF EXISTS usuarios;");

$conn->query("CREATE TABLE usuarios(
                id_usuario serial,
                login VARCHAR(25),
                email VARCHAR(64),
                senha VARCHAR(32),
                PRIMARY KEY (id_usuario)
              );");

$conn->query("DROP TABLE IF EXISTS logDiscos;");
$conn->query("DROP TABLE IF EXISTS discos;");
$conn->query("DROP TABLE IF EXISTS servidores;");
$conn->query("DROP TABLE IF EXISTS clientes;");
#$conn->query("DROP FUNCTION IF EXISTS atualizacaoDiscos();");

$conn->query("CREATE TABLE clientes(
                id_cliente serial,
                nome VARCHAR(15) NOT NULL,
                PRIMARY KEY (id_cliente)
              );");

$conn->query("CREATE TABLE servidores(
                id_servidor serial,
                id_cliente int NOT NULL,
                SO int NOT NULL,
                descricao_SO VARCHAR(15),
                PRIMARY KEY (id_servidor),
                FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
              );");

$conn->query("CREATE TABLE discos(
                id_disco serial,
                id_servidor int NOT NULL,
                local VARCHAR(15) NOT NULL,
                particao VARCHAR(15) NOT NULL,
                PRIMARY KEY (id_disco),
                FOREIGN KEY (id_servidor) REFERENCES servidores (id_servidor)
              );");

$conn->query("CREATE TABLE logDiscos(
                id_logDisco serial,
                id_disco int NOT NULL,
                total int NOT NULL,
                usado int NOT NULL,
                disponivel int NOT NULL,
                porcentagem int NOT NULL,
                data date NOT NULL,
                horario time NOT NULL,
                PRIMARY KEY (id_logDisco),
                FOREIGN KEY (id_disco) REFERENCES discos (id_disco)
              );");

/*$conn->query("CREATE OR REPLACE FUNCTION atualizacaoDiscos() RETURNS trigger AS $$
              BEGIN
                DELETE FROM discos WHERE id_servidor = new.id_servidor;
                INSERT INTO discos (id_servidor, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (new.id_servidor, new.local, new.particao, new.total, new.usado, new.disponivel, new.porcentagem, new.data, new.horario);
                RETURN NEW;
              END;
              $$ LANGUAGE plpgsql;");

$conn->query("CREATE TRIGGER atualizaDiscos
                BEFORE INSERT ON logDiscos
                FOR EACH ROW EXECUTE PROCEDURE atualizacaoDiscos();"
              );*/

?>
