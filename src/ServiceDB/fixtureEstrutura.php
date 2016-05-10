<?php

require_once 'ConnectDB.php';

$conexao = new src\ServiceDB\ConnectDB();
$conn = $conexao->getConn();

$conn->query("DROP TABLE IF EXISTS usuarios;");
$conn->query("DROP TABLE IF EXISTS estDiscos;");
$conn->query("DROP TABLE IF EXISTS logDiscos;");
$conn->query("DROP TABLE IF EXISTS servidores;");
$conn->query("DROP TABLE IF EXISTS clientes;");
$conn->query("DROP FUNCTION IF EXISTS atualizacaoDiscos();");
$conn->query("DROP VIEW IF EXISTS mostraDiscos;");

$conn->query("CREATE TABLE usuarios(
                id_usuario serial,
                login VARCHAR(25) NOT NULL,
                email VARCHAR(64) NOT NULL,
                senha VARCHAR(32) NOT NULL,
                PRIMARY KEY (id_usuario)
              );");

$conn->query("CREATE TABLE clientes(
                id_cliente serial,
                nome VARCHAR(15) NOT NULL,
                PRIMARY KEY (id_cliente)
              );");

$conn->query("CREATE TABLE servidores(
                id_servidor serial,
                id_cliente int NOT NULL,
                descricao VARCHAR(15) NOT NULL,
                arq_so int NOT NULL,
                PRIMARY KEY (id_servidor),
                FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
              );");

$conn->query("CREATE TABLE estDiscos(
                id_disco serial,
                id_servidor int NOT NULL,
                id_local int NOT NULL,
                local VARCHAR(15) NOT NULL,
                particao VARCHAR(15) NOT NULL,
                total int NOT NULL,
                usado int NOT NULL,
                disponivel int NOT NULL,
                porcentagem int NOT NULL,
                data date NOT NULL,
                horario time NOT NULL,
                PRIMARY KEY (id_disco),
                FOREIGN KEY (id_servidor) REFERENCES servidores (id_servidor)
              );");

$conn->query("CREATE TABLE logDiscos(
                id_disco serial,
                id_servidor int NOT NULL,
                id_local int NOT NULL,
                local VARCHAR(15) NOT NULL,
                particao VARCHAR(15) NOT NULL,
                total int NOT NULL,
                usado int NOT NULL,
                disponivel int NOT NULL,
                porcentagem int NOT NULL,
                data date NOT NULL,
                horario time NOT NULL,
                PRIMARY KEY (id_disco),
                FOREIGN KEY (id_servidor) REFERENCES servidores (id_servidor)
              );");

$conn->query("CREATE OR REPLACE FUNCTION atualizacaoDiscos() RETURNS trigger AS $$
              BEGIN
                DELETE FROM estDiscos WHERE id_servidor = new.id_servidor AND id_local = new.id_local;
                INSERT INTO estDiscos (id_servidor, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (new.id_servidor, new.id_local, new.local, new.particao, new.total, new.usado, new.disponivel, new.porcentagem, new.data, new.horario);
                RETURN NEW;
              END;
              $$ LANGUAGE plpgsql;");

$conn->query("CREATE TRIGGER clienteDiscos
                BEFORE INSERT ON logDiscos
                FOR EACH ROW EXECUTE PROCEDURE atualizacaoDiscos();"
              );

$conn->query("CREATE VIEW mostraDiscos AS (
              SELECT estDiscos.*, servidores.descricao, clientes.nome FROM estDiscos INNER JOIN servidores ON estDiscos.id_servidor = servidores.id_servidor INNER JOIN clientes ON servidores.id_cliente = clientes.id_cliente);"
             );

?>
